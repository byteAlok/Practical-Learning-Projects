using System;
using System.Collections.Generic;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Drawing.Imaging;

namespace Captcha_.Net_.Controllers
{
    public class CaptchaController : Controller
    {
        // GET: Captcha
        public ActionResult Image()
        {
            string text = new Random().Next(100, 1000).ToString();

            Session["Captcha"] = text;

            using (Bitmap bmp = new Bitmap(100, 50))
            using (Graphics g = Graphics.FromImage(bmp))
            {
                g.Clear(Color.White);
                g.DrawString(text, new Font("Arial", 10, FontStyle.Bold), Brushes.Black, 10, 5);

                using (MemoryStream ms = new MemoryStream())
                {
                    bmp.Save(ms, ImageFormat.Png);
                    return File(ms.ToArray(), "image/png");
                }
            }


            return View();
        }
    }
}