using CaptchaOtp.Models;
using Microsoft.AspNetCore.Mvc;

public class OTPController : Controller
{
    public IActionResult Index()
    {
        return View();
    }

    public IActionResult GenerateOTP()
    {
        string otp = OTPGenerator.GenerateOTP();

        // Store OTP in session
        HttpContext.Session.SetString("GeneratedOTP", otp);
        HttpContext.Session.SetString("OTPExpiry", DateTime.Now.AddMinutes(5).ToString());

        ViewBag.OTP = otp; // For testing only
        return View("Index");
    }

    [HttpPost]
    public IActionResult VerifyOTP(string otp)
    {
        var storedOtp = HttpContext.Session.GetString("GeneratedOTP");
        var expiry = DateTime.Parse(HttpContext.Session.GetString("OTPExpiry"));

        if (DateTime.Now > expiry)
        {
            ViewBag.Message = "OTP expired!";
        }
        else if (otp == storedOtp)
        {
            ViewBag.Message = "OTP verified!";
            HttpContext.Session.Remove("GeneratedOTP");
            HttpContext.Session.Remove("OTPExpiry");
        }
        else
        {
            ViewBag.Message = "Invalid OTP!";
        }

        return View("Index");
    }
}
