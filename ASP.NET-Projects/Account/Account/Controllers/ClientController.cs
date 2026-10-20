
using Account.Models;
using Account.Models.ViewModels;
using Account.ViewModels;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;


namespace Account.Controllers
{
    [Authorize]
    public class ClientController : Controller
    {
        private readonly MyConnection _context;
        private readonly IWebHostEnvironment _env;

        public ClientController(MyConnection context, IWebHostEnvironment env)
        {
            _context = context;
            _env = env;
        }
        public IActionResult Index()
        {
            // Logged in client id
            var clientId = HttpContext.Session.GetInt32("ClientId");

            if (clientId == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            // Total jobs
            ViewBag.TotalJobsPosted = _context.PostJob
                .Count(j => j.ClientId == clientId);

            // Active jobs
            ViewBag.ActiveJobs = _context.PostJob
                .Count(j => j.ClientId == clientId &&
                            j.Status == "Open");

            // Completed jobs
            ViewBag.TotalHired = _context.PostJob
                .Count(j => j.ClientId == clientId &&
                            j.Status == "Completed");

            // Recent jobs of this client
            var recentJobs = _context.PostJob
                .Where(j => j.ClientId == clientId)
                .OrderByDescending(j => j.CreatedAt)
                .Take(5)
                .ToList();

            ViewBag.RecentJobs = recentJobs;

            return View();
        }
        public async Task<IActionResult> FreelancerDetails(int id)
        {
            var freelancer = await _context.User
                .FirstOrDefaultAsync(x => x.Id == id);

            if (freelancer == null)
            {
                return NotFound();
            }

            var portfolioPosts = await _context.PortfolioPosts
                .Where(x => x.UserId == id)
                .OrderByDescending(x => x.CreatedAt)
                .ToListAsync();

            var vm = new FreelancerDashboardViewModel
            {
                Freelancer = freelancer,
                PortfolioPosts = portfolioPosts
            };

            return View(vm);
        }


        [HttpGet]
        public async Task<IActionResult> FindTalent(string? search)
        {
            // Start query from Freelancer users only
            var freelancers = _context.User
                .Where(u => u.Role == "Freelancer");

            // If search keyword exists
            if (!string.IsNullOrWhiteSpace(search))
            {
                // Convert search to lowercase
                search = search.Trim().ToLower();

                freelancers = freelancers.Where(u =>

                    // Search by Full Name
                    (u.FullName != null &&
                     u.FullName.ToLower().Contains(search))

                    ||

                    // Search by Skills
                    (u.Skills != null &&
                     u.Skills.ToLower().Contains(search))

                    ||
                    // Search by Bio
                    (u.Bio != null &&
                     u.Bio.ToLower().Contains(search))

                    ||

                    // Search by Location
                    (u.Location != null &&
                     u.Location.ToLower().Contains(search))
                );
            }

            // Order freelancers
            var result = await freelancers
                .OrderByDescending(u => u.Rating)
                .ToListAsync();

            // Send search keyword back to view
            ViewBag.Search = search;

            return View(result);
        }
    



            public IActionResult Profile()
            {
            var userId = HttpContext.Session.GetInt32("UserId");
            var clientId = HttpContext.Session.GetInt32("ClientId");
            if (userId == null && clientId == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            var user = _context.User.FirstOrDefault(u => u.Id == userId || u.Id==clientId);
            if (user == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            return View(user);
        }

        [HttpGet]
        public IActionResult Edit()
        {
            //var userId = HttpContext.Session.GetInt32("UserId");
            var clientId = HttpContext.Session.GetInt32("ClientId");
            if ( clientId == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            //var user = _context.User.FirstOrDefault(u => u.Id == userId);
            var client = _context.User.FirstOrDefault(u => u.Id == clientId);
            if (client == null )
            {
                return RedirectToAction("Login", "Authentication");
            }

            return View(client);
        }

        [HttpPost]
        public async Task<IActionResult> Edit(UserClass model, IFormFile? profileImage)
        {
            //var userId = HttpContext.Session.GetInt32("UserId");
            var clientId = HttpContext.Session.GetInt32("ClientId");
            if (clientId == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            // Remove unneeded fields from validation state to prevent blocking
            ModelState.Remove("Password");
            ModelState.Remove("Role");

            if (profileImage != null)
            {
                ModelState.Remove("profileImage");
            }

            if (ModelState.IsValid)
            {
                //var user = _context.User.FirstOrDefault(u => u.Id == userId);
                var client = _context.User.FirstOrDefault(u => u.Id == clientId);
                if (client != null)
                {
                    client.FullName = model.FullName;
                   
                    client.Email = model.Email;
                    client.Location = model.Location;
                    client.Bio = model.Bio;

                    //if (user.Role == "Freelancer")
                    //{
                    //    user.Skills = model.Skills;
                    //}

                    // Handle Profile Image Upload
                    if (profileImage != null && profileImage.Length > 0)
                    {
                        var uploadsFolder = Path.Combine(_env.WebRootPath, "uploads");
                        if (!Directory.Exists(uploadsFolder))
                        {
                            Directory.CreateDirectory(uploadsFolder);
                        }

                        var uniqueFileName = Guid.NewGuid().ToString() + "_" + Path.GetFileName(profileImage.FileName);
                        var filePath = Path.Combine(uploadsFolder, uniqueFileName);

                        using (var fileStream = new FileStream(filePath, FileMode.Create))
                        {
                            await profileImage.CopyToAsync(fileStream);
                        }

                        client.ProfilePhotoPath = "/uploads/" + uniqueFileName;
                    }

                    _context.SaveChanges();

                    // Update Session info
                    //HttpContext.Session.SetString("UserName", $"{user.FullName}");
                    //HttpContext.Session.SetString("UserEmail", user.Email);

                    HttpContext.Session.SetString("ClientName", $"{client.FullName}");
                    HttpContext.Session.SetString("ClientEmail", client.Email);

                    return RedirectToAction("Index");
                }
            }
            return View(model);
        }
    
            // GET: Post Job Page
            [HttpGet]
            public IActionResult PostJob()
            {
                return View();
            }

            // POST: Save Job
            [HttpPost]
            [ValidateAntiForgeryToken]
            public IActionResult PostJob(JobPostClass model)
            {
                // Get logged-in client id from session
                var clientId = HttpContext.Session.GetInt32("ClientId");

                if (clientId == null)
                {
                    return RedirectToAction("Login", "Authentication");
                }

                if (ModelState.IsValid)
                {
                    // Assign Client Id
                    model.ClientId = clientId.Value;

                    // Set Created Date
                    model.CreatedAt = DateTime.Now;

                    // Default Status
                    model.Status = "Open";

                    // Save into database
                    _context.PostJob.Add(model);

                    _context.SaveChanges();

                    TempData["Success"] = "Job posted successfully.";

                    return RedirectToAction("Index");
                }

                return View(model);
            }

    }
}
