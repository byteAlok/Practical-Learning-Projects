using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace PartialView.Controllers
{
    public class HomeController : Controller
    {
        
        public ActionResult HomePage()
        {
            return View();
        }
        [HttpPost]
        public ActionResult HomePage(string FullName, string Email, string Phone)
        {
            if(FullName.Equals("") == true)
            {
                ModelState.AddModelError("vFullName", "Enter your name");
               
            }
            if (Email.Equals("") == true)
            {
                ModelState.AddModelError("vEmail", "Enter your email");
               
            }
            if (Phone.Equals("") == true)
            {
                ModelState.AddModelError("vPhone", "Enter your phone");
               
            }
            return View();
        }
        
    }
}