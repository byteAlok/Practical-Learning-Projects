using System.Diagnostics;
using CaptchaOtp.Models;
using Microsoft.AspNetCore.Mvc;

namespace CaptchaOtp.Controllers
{
    public class HomeController : Controller
    {
        private readonly ILogger<HomeController> _logger;

        public HomeController(ILogger<HomeController> logger)
        {
            _logger = logger;
        }

        public IActionResult Index()
        {
            return View();
        }

        [HttpPost]
        public IActionResult Submit(string CaptchaInput)
        {
            var storedCaptcha = HttpContext.Session.GetString("CaptchaCode");

            if (CaptchaInput != storedCaptcha)
            {
                ViewBag.Error = "Invalid Captcha! Try again.";
                return View("Index");
            }

            ViewBag.Message = "Captcha Verified Successfully ?";
            return View("Index");
        }

        public IActionResult Privacy()
        {
            return View();
        }

        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }
    }
}
