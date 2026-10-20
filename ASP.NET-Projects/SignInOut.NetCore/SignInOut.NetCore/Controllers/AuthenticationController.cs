using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using SignInOut.NetCore.Models;
using Microsoft.Data.SqlClient;
using Microsoft.AspNetCore.Authentication;
using Microsoft.AspNetCore.Authentication.Cookies;
using System.Security.Claims;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Authorization;

namespace SignInOut.NetCore.Controllers
{
    public class AuthenticationController(ContextDb db) : Controller
    {
        public IActionResult Login() => View();

        [HttpPost]
        public async Task<IActionResult> Login(UserClass s)
        {
            var UserDetails = db.Users.FirstOrDefault(a => a.UserName == s.UserName && a.Password == s.Password);
            if (UserDetails != null)
            {

                HttpContext.Session.SetString("UserId", UserDetails.Id.ToString());
                HttpContext.Session.SetString("Name", UserDetails.Name);
                HttpContext.Session.SetString("Uname", UserDetails.UserName);

                var claims = new List<Claim>
                {
                    new Claim(ClaimTypes.Name, s.UserName),
                    new Claim("UserId", UserDetails.Id.ToString())
                };
                var identity = new ClaimsIdentity(claims, CookieAuthenticationDefaults.AuthenticationScheme);

                var principal = new ClaimsPrincipal(identity);

                var props = new AuthenticationProperties
                {
                    IsPersistent = true,
                    ExpiresUtc = DateTimeOffset.UtcNow.AddSeconds(15)
                };

                await HttpContext.SignInAsync(CookieAuthenticationDefaults.AuthenticationScheme, principal, props);

                return RedirectToAction("Index", "Home");
            }
            ViewBag.Error = "Invalid Username or Password";
            return View();
        }

        public async Task<IActionResult> Logout()
        {
            HttpContext.Session.Clear();
            await HttpContext.SignOutAsync(CookieAuthenticationDefaults.AuthenticationScheme);
            Response.Cookies.Delete("alooSession");

            return RedirectToAction("Login", "Authentication");
        }
    
    }

}
