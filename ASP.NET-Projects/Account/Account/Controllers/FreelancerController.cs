


using System.Security.Cryptography;
using Account.Models;
using Account.Models.ViewModels;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace Account.Controllers
{
    public class FreelancerController : Controller
    {
        private readonly MyConnection _context;

        public FreelancerController(MyConnection context)
        {
            _context = context;
        }
        public async Task<IActionResult> Index()
        {
            int? freelancerId = HttpContext.Session.GetInt32("UserId");

            if (freelancerId == null)
            {
                return RedirectToAction("Login", "Account");
            }

            var freelancer = await _context.User
                .FirstOrDefaultAsync(x => x.Id == freelancerId);

            if (freelancer == null)
            {
                return NotFound();
            }

            var recentBids = await _context.Bids
                .Include(b => b.JobPost)
                .ThenInclude(j => j.Client)
                .Where(b => b.FreelancerId == freelancerId)
                .OrderByDescending(b => b.CreatedAt)
                .Take(5)
                .ToListAsync();

            var vm = new FreelancerDashboardViewModel
            {
                Freelancer = freelancer,

                ActiveBids = await _context.Bids
                    .CountAsync(x =>
                        x.FreelancerId == freelancerId &&
                        x.Status == "Pending"),

                OngoingJobs = await _context.Bids
                    .CountAsync(x =>
                        x.FreelancerId == freelancerId &&
                        x.Status == "Accepted"),

                CompletedJobs = 14,

                RecentBids = recentBids,

                PortfolioPosts = await _context.PortfolioPosts
                    .Where(x => x.UserId == freelancerId)
                    .Take(4)
                    .ToListAsync()
            };

            return View(vm);
        }

        public async Task<IActionResult> Portfolio()
        {
            // Get logged in freelancer id
            int? userId = HttpContext.Session.GetInt32("UserId");

            // If not logged in
            if (userId == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            // Get freelancer details
            var freelancer = await _context.User
                .FirstOrDefaultAsync(x => x.Id == userId);

            if (freelancer == null)
            {
                return NotFound();
            }

            // Get freelancer portfolio posts
            var portfolioPosts = await _context.PortfolioPosts
                .Where(x => x.UserId == userId)
                .OrderByDescending(x => x.CreatedAt)
                .ToListAsync();

            // Create ViewModel
            var vm = new FreelancerDashboardViewModel
            {
                Freelancer = freelancer,
                PortfolioPosts = portfolioPosts
            };

            return View(vm);
        }



        public IActionResult PortfolioPost()
        {
            return View();
        }
        [HttpPost]
        [ValidateAntiForgeryToken]
        public IActionResult PortfolioPost(PortfolioPost portfolio, IFormFile ImageFile)
        {
            var userId = HttpContext.Session.GetInt32("UserId");

            if (userId == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            if (ModelState.IsValid)
            {
                // Save Image
                if (ImageFile != null && ImageFile.Length > 0)
                {
                    string folder = Path.Combine(Directory.GetCurrentDirectory(),
                                                 "wwwroot/PortfolioImages");

                    if (!Directory.Exists(folder))
                    {
                        Directory.CreateDirectory(folder);
                    }

                    string fileName = Guid.NewGuid().ToString() + Path.GetExtension(ImageFile.FileName);

                    string filePath = Path.Combine(folder, fileName);

                    using (var stream = new FileStream(filePath, FileMode.Create))
                    {
                        ImageFile.CopyTo(stream);
                    }

                    portfolio.ImagePath = "/PortfolioImages/" + fileName;
                }

                portfolio.UserId = userId.Value;
                portfolio.CreatedAt = DateTime.Now;

                _context.PortfolioPosts.Add(portfolio);
                _context.SaveChanges();

                TempData["Posted"] = "Portfolio Added Successfully";

                return RedirectToAction("Index");
            }

            return View(portfolio);
        }

        [HttpGet]
        public async Task<IActionResult> JobDetails(int id)
        {
            var job = await _context.PostJob
                .Include(j => j.Client)
                .FirstOrDefaultAsync(j => j.Id == id);

            if (job == null)
            {
                return NotFound();
            }

            return View(job);
        }
        [HttpPost]
        public async Task<IActionResult> SubmitBid(int jobPostId, decimal amount, string coverLetter)
        {
            // Check freelancer login
            int? freelancerId = HttpContext.Session.GetInt32("UserId");

            if (freelancerId == null)
            {
                return RedirectToAction("Login", "Account");
            }

            // Check job exists
            var job = await _context.PostJob
                .FirstOrDefaultAsync(x => x.Id == jobPostId);

            if (job == null)
            {
                return NotFound();
            }

            // Prevent duplicate bid
            var alreadyBid = await _context.Bids
                .FirstOrDefaultAsync(x =>
                    x.JobPostId == jobPostId &&
                    x.FreelancerId == freelancerId);

            if (alreadyBid != null)
            {
                TempData["Error"] = "You already submitted a bid for this job.";

                return RedirectToAction("JobDetails", new { id = jobPostId });
            }

            // Create Bid
            BidClass bid = new BidClass()
            {
                JobPostId = jobPostId,
                FreelancerId = freelancerId.Value,
                Amount = amount,
                CoverLetter = coverLetter,
                Status = "Pending",
                CreatedAt = DateTime.UtcNow
            };

            _context.Bids.Add(bid);

            await _context.SaveChangesAsync();

            TempData["Success"] = "Bid submitted successfully.";

            return RedirectToAction("JobDetails", new { id = jobPostId });
        }

        [HttpGet]
        public async Task<IActionResult> FindJob(string? search)
        {
            // Start query from Job Posts
            var jobs = _context.PostJob
                .Include(j => j.Client)
                .Where(j => j.Status == "Open");

            // Search functionality
            if (!string.IsNullOrWhiteSpace(search))
            {
                search = search.Trim().ToLower();

                jobs = jobs.Where(j =>

                    (j.JobTitle != null &&
                     j.JobTitle.ToLower().Contains(search))

                     ||

                    (j.JobCategory != null &&
                     j.JobCategory.ToLower().Contains(search))

                     ||

                    (j.JobDescription != null &&
                     j.JobDescription.ToLower().Contains(search))

                     ||

                    (j.LocationType != null &&
                     j.LocationType.ToLower().Contains(search))
                );
            }

            // Order latest jobs first
            var result = await jobs
                .OrderByDescending(j => j.CreatedAt)
                .ToListAsync();

            // Send search back to view
            ViewBag.Search = search;

            return View(result);
        }
    }
}