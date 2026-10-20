using System.Net;
using System.Net.Mail;

namespace Account.Models
{
    public class EmailServices
    {
        public string Msg { get; set; }
        public int Otp { get; set; }

        public async Task<EmailServices> Email(string userEmail)
        {
            Random random = new Random();
            int otp = random.Next(1000, 9999);

            try
            {
                var client = new SmtpClient("smtp.gmail.com", 587)
                {
                    Credentials = new NetworkCredential(
                        "ay5332144@gmail.com",
                        "xkuykediwprpzriy"
                    ),
                    EnableSsl = true
                };

                var mail = new MailMessage(
                    "ay5332144@gmail.com",
                    userEmail
                );

                mail.Subject = "Identity Verification Code";
                mail.Body = "Your OTP is: " + otp;

                await client.SendMailAsync(mail);

                return new EmailServices()
                {
                    Msg = "OTP sent successfully",
                    Otp = otp
                };
            }
            catch (Exception ex)
            {
                return new EmailServices()
                {
                    Msg = ex.Message,
                    Otp = 0
                };
            }
        }
    }
}