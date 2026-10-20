using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Mail;
using System.Text;
using System.Threading.Tasks;
using static System.Net.WebRequestMethods;

namespace EmailDemo
{
    internal class Program
    {
        static string otp = string.Empty;
        static async Task Main(string[] args)
        {
            //var client = new SmtpClient("smtp.gmail.com",587);
            //client.Credentials = new NetworkCredential("alokmaurya2056776@gmail.com", "pzih sydy fatt twav");
            //client.EnableSsl = true;

            //var mail = new MailMessage("alokmaurya2056776@gmail.com", "alokmauryaofficial7349@gmail.com");

            var random = new Random();

            for (int i = 0; i < 3; i++) otp = otp + random.Next(0, 10);

            //mail.Subject = "THis is Subject";
            //mail.Body = $"This is Body : {otp}";
            //client.Send(mail);

            Console.WriteLine("OTP Sent on Email");
            Console.Write("OTP : ");
            Console.WriteLine(otp);

            await Task.Delay(6000);
            exp();

            Console.Write("Enter OTP : ");
            string s = Console.ReadLine();

            if (s == otp) Console.WriteLine("Verified OTP");
            else Console.WriteLine("Envalid OTP");

        }

        public static void exp()
        {
            otp = "0";
            Console.Write(otp);
            Console.WriteLine(" : OTP Expired");
        }
      
    }
}
