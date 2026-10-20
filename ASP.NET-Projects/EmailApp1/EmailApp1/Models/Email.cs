using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Mail;
using System.Web;

namespace EmailApp1.Models
{
    public class Email
    {
        public string Reciever { get; set; }
        public string Subject { get; set; }
        public string Body { get; set; }

        public string EmailSend()
        {
            var client = new SmtpClient("smtp.gmail.com", 587);
            client.Credentials = new NetworkCredential("alokmaurya2056776@gmail.com", "pzih sydy fatt twav");
            client.EnableSsl = true;

            var mail = new MailMessage("alokmaurya2056776@gmail.com", Reciever);

            mail.Subject = Subject;
            mail.Body = Body;
            client.Send(mail);

            return "Email Sent Successfully";
        }
    }
}