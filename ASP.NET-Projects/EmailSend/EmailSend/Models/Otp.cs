using System.Net;
using System.Net.Mail;

namespace EmailSend.Models
{
    public class Otp
    {
        public string Email { get; set; }
        public static string GenOtp { get; set; }
        public string UserOtp {  get; set; }

        public string GenerateOtp()
        {
            var client = new SmtpClient("smtp.gmail.com", 587);
            client.Credentials = new NetworkCredential("alokmaurya2056776@gmail.com", "pzih sydy fatt twav");
            client.EnableSsl = true;

            var mail = new MailMessage("alokmaurya2056776@gmail.com", "alokmauryaofficial7349@gmail.com");

            var random = new Random();

            string otp = String.Empty;

            for (int i = 0; i < 6; i++) otp = otp + random.Next(0, 10);

            mail.Subject = "THis is Subject";
            mail.Body = $"This is Body : {otp}";
            client.Send(mail);

            Console.WriteLine("OTP Sent on Email");

            Console.Write("Enter OTP : ");
            string s = Console.ReadLine();

            if (s == otp) Console.WriteLine("Verified OTP");
            else Console.WriteLine("Envalid OTP");

        }
    }
}
