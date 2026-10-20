using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Mail;
using System.Text;
using System.Threading.Tasks;

namespace EmailDemo
{
    internal class Program
    {
        static void Main(string[] args)
        {
            var client = new SmtpClient("smtp.gmail.com",587);
            client.Credentials = new NetworkCredential("alokmaurya2056776@gmail.com", "pzih sydy fatt twav");
            client.EnableSsl = true;

            var mail = new MailMessage("alokmaurya2056776@gmail.com", "alokmauryaofficial7349@gmail.com");

            mail.Subject = "THis is Subject";
            mail.Body = "This is Body";
            client.Send(mail);
            Console.WriteLine("Email Sent");
        }
    }
}
