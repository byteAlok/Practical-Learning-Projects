using System.Diagnostics;
using CaptchaWeb.Models;
using Microsoft.AspNetCore.Mvc;


namespace CaptchaWeb.Controllers
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
        public IActionResult GetCaptcha( string cap) 
        {
            string org = HttpContext.Session.GetString("Captcha") as String;

            if (cap == org) ViewBag.Msg = "Verified";

            else ViewBag.Msg = "Invalid";

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
