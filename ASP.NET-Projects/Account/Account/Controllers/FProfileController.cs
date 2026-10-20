
using Account.Models;
using Account.ViewModels;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;


namespace Account.Controllers
{
    [Authorize]
    public class FProfileController : Controller
    {
        private readonly MyConnection _context;
        private readonly IWebHostEnvironment _env;

        public FProfileController(MyConnection context, IWebHostEnvironment env)
        {
            _context = context;
            _env = env;
        }
        
        
       


        public IActionResult Profile()
        {
            var userId = HttpContext.Session.GetInt32("UserId");
            var clientId = HttpContext.Session.GetInt32("ClientId");
            if (userId == null && clientId == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            var user = _context.User.FirstOrDefault(u => u.Id == userId || u.Id == clientId);
            if (user == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            return View(user);
        }

        [HttpGet]
        public IActionResult EditProfile()
        {
            var userId = HttpContext.Session.GetInt32("UserId");
            //var clientId = HttpContext.Session.GetInt32("ClientId");
            if (userId == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            var user = _context.User.FirstOrDefault(u => u.Id == userId);
           // var client = _context.User.FirstOrDefault(u => u.Id == clientId);
            if (user == null)
            {
                return RedirectToAction("Login", "Authentication");
            }

            return View(user);
        }

        [HttpPost]
        public async Task<IActionResult> EditProfile(UserClass model, IFormFile? profileImage)
        {
            var userId = HttpContext.Session.GetInt32("UserId");
            //var clientId = HttpContext.Session.GetInt32("ClientId");
            if (userId == null)
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
                var user = _context.User.FirstOrDefault(u => u.Id == userId);
                //var client = _context.User.FirstOrDefault(u => u.Id == clientId);
                if (user != null)
                {
                    user.FullName = model.FullName;

                    user.Email = model.Email;
                    user.Location = model.Location;
                    user.Bio = model.Bio;

                    if (user.Role == "Freelancer")
                    {
                        user.Skills = model.Skills;
                    }

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

                        user.ProfilePhotoPath = "/uploads/" + uniqueFileName;
                    }

                    _context.SaveChanges();

                    // Update Session info
                    HttpContext.Session.SetString("UserName", $"{user.FullName}");
                    HttpContext.Session.SetString("UserEmail", user.Email);

                    //HttpContext.Session.SetString("ClientName", $"{client.FullName}");
                    //HttpContext.Session.SetString("ClientEmail", client.Email);

                    return RedirectToAction("Index","Freelancer");
                }
            }
            return View(model);
        }

       
       

    }
}
