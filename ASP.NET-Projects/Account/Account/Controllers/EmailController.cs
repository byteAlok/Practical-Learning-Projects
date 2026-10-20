using System.Net.Mail;
using System.Net;
using Microsoft.AspNetCore.Mvc;

namespace Account.Controllers
{
    public class EmailController : Controller
    {

        [HttpGet]
        public IActionResult Email()
        {
            return View();
        }

        [HttpPost]
        public async Task<IActionResult> Email(string userEmail)
        {
            // Generate OTP
            Random random = new Random();
            int otp = random.Next(1000, 9999);

            // Send email
            var client = new SmtpClient("smtp.gmail.com", 587)
            {
                Credentials = new NetworkCredential(
                    "ay5332144@gmail.com",
                    "ykal kvvp xpxa viyg"   // Gmail App Password
                ),
                EnableSsl = true
            };

            var mail = new MailMessage("ay5332144@gmail.com", userEmail);
            mail.Subject = "Your OTP Code";
            mail.Body = "Your OTP is: " + otp;

            await client.SendMailAsync(mail);

            // Save OTP for verification
            TempData["otp"] = otp;
            TempData["email"] = userEmail;

            ViewBag.Email = "OTP sent successfully to " + userEmail;

            return RedirectToAction("VerifyOtp");
        }
        [HttpGet]
        public IActionResult VerifyOtp()
        {
            TempData.Keep("otp"); // Keep OTP after redirect
            return View();
        }



        [HttpPost]
        public IActionResult VerifyOtp(int userOtp)
        {
            int realOtp = Convert.ToInt32(TempData["otp"]);

            if (userOtp == realOtp)
                ViewBag.Result = "OTP Verified Successfully!";
            else
                ViewBag.Result = "Incorrect OTP!";

            return View();
        }

    }
}
