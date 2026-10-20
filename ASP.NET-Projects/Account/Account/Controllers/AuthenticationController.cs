using Account.Models;
using Microsoft.AspNetCore.Authentication;
using Microsoft.AspNetCore.Authentication.Cookies;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.StaticFiles;
using System.Security.Claims;

namespace Account.Controllers
{
    public class AuthenticationController(MyConnection _db) : Controller
    {
        private readonly MyConnection db = _db;
        public IActionResult Login() => View();

        [HttpPost]
        public async Task<IActionResult> Login(string NameorEmail, string pass)
        {

            var UserDetails = db.User.FirstOrDefault(a => (a.FullName == NameorEmail || a.Email == NameorEmail)
                                && a.Password == pass && a.Role== "Freelancer");

            var ClientDetails = db.User.FirstOrDefault(a => (a.FullName == NameorEmail || a.Email == NameorEmail)
                                && a.Password == pass && a.Role == "Client");

            if (UserDetails != null)
            {

                HttpContext.Session.SetInt32("UserId", UserDetails.Id);
                HttpContext.Session.SetString("UserFullName", UserDetails.FullName);
                HttpContext.Session.SetString("UserBio", UserDetails.Bio ?? "");
                HttpContext.Session.SetString("UserLocation", UserDetails.Location ?? "");
                HttpContext.Session.SetString("UserRole", UserDetails.Role ?? "");
                HttpContext.Session.SetString("UserSkill", UserDetails.Skills ?? "");

                // Store Rating
                HttpContext.Session.SetString(
                    "UserRating",
                    UserDetails.Rating?.ToString() ?? "0"
                );

                // Store Date
                HttpContext.Session.SetString(
                    "UserRegisterDate",
                    UserDetails.CreatedAt.ToString("yyyy-MM-dd")
                );

                HttpContext.Session.SetString("UserEmail", UserDetails.Email);
                HttpContext.Session.SetString("UserImage", UserDetails.ProfilePhotoPath ?? "");


                var claims = new List<Claim>
                {
                    new Claim(ClaimTypes.Name, UserDetails.FullName),
                    new Claim(ClaimTypes.Role, "Freelancer")
                };
                var identity = new ClaimsIdentity(claims, CookieAuthenticationDefaults.AuthenticationScheme);

                var principal = new ClaimsPrincipal(identity);

                var props = new AuthenticationProperties
                {
                    IsPersistent = true,
                    ExpiresUtc = DateTimeOffset.UtcNow.AddSeconds(300)
                };

                await HttpContext.SignInAsync(CookieAuthenticationDefaults.AuthenticationScheme, principal, props);

                return RedirectToAction("Index", "Freelancer");
            }

            else if (ClientDetails != null)
            {
                HttpContext.Session.SetInt32("ClientId", ClientDetails.Id);
                HttpContext.Session.SetString("ClientFullName", ClientDetails.FullName);
                HttpContext.Session.SetString("ClientBio", ClientDetails.Bio ?? "");
                HttpContext.Session.SetString("ClientLocation", ClientDetails.Location ?? "");
                HttpContext.Session.SetString("ClientRole", ClientDetails.Role ?? "");

                HttpContext.Session.SetString("ClientEmail", ClientDetails.Email);
                HttpContext.Session.SetString("ClientImage", ClientDetails.ProfilePhotoPath ?? "");
                //HttpContext.Session.SetString("ClientRegisterDate", ClientDetails.CreatedAt);

                var claims = new List<Claim>
                {
                    new Claim(ClaimTypes.Email, ClientDetails.Email),
                    new Claim(ClaimTypes.Role, "Client")
                };
                var identity = new ClaimsIdentity(claims, CookieAuthenticationDefaults.AuthenticationScheme);

                var principal = new ClaimsPrincipal(identity);

                var props = new AuthenticationProperties
                {
                    IsPersistent = true,
                    ExpiresUtc = DateTimeOffset.UtcNow.AddSeconds(300)
                };

                await HttpContext.SignInAsync(CookieAuthenticationDefaults.AuthenticationScheme, principal, props);

                return RedirectToAction("Index", "Client");
            }
            TempData["invalid"] = "Invalid Username or Password";
            return View();
        }

        public IActionResult Register() => View();
        [HttpPost]
        public IActionResult Register(UserClass usr, string CaptchaInput)
        {
            string str = Submit(CaptchaInput);
            TempData["capMsg"] = str;

            var check = db.User.Any(x => x.FullName == usr.FullName && x.Email == usr.Email);

            if (check)
            {
                TempData["Error"] = "UserName ya Email already exists!";
                return View();
            }

            if (ModelState.IsValid && str == "Captcha Verified!")
            {
                db.User.Add(usr);
                db.SaveChanges();
                TempData["regMsg"] = "Registration Successfull!";
                return RedirectToAction("Login", "Authentication");
            }

            TempData["Error"] = "Registration Failed!";
            return View();
        }


        public async Task<IActionResult> Logout()
        {
            HttpContext.Session.Clear();
            await HttpContext.SignOutAsync(CookieAuthenticationDefaults.AuthenticationScheme);
            Response.Cookies.Delete("EducationSessionCookie");

            return RedirectToAction("Index", "Home");
        }

        [Authorize]
        public IActionResult GetImage(string file)
        {
            var defaultImgPath = Path.Combine(Directory.GetCurrentDirectory(), "wwwroot", "images", "defaultLogo.png");

            // 1. If no file, return default
            if (string.IsNullOrEmpty(file))
                return PhysicalFile(defaultImgPath, "image/png");

            // 2. Security check
            if (file.Contains("..") || file.Contains("/") || file.Contains("\\"))
                return Unauthorized();

            // 3. Build user image path
            var path = Path.Combine(Directory.GetCurrentDirectory(), "PrivateUpload", file);

            // 4. If user image missing → return default
            if (!System.IO.File.Exists(path))
                return PhysicalFile(defaultImgPath, "image/png");

            // 5. Return actual file
            return PhysicalFile(path, "image/png");
        }


        public string Submit(string CaptchaInput)
        {
            var storedCaptcha = HttpContext.Session.GetString("CaptchaCode");

            if (CaptchaInput != storedCaptcha)
            {

                return "Invalid Captcha!";
            }

            return "Captcha Verified!";
        }


    }
}