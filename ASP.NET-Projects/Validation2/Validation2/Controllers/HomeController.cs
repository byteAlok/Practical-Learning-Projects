using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Validation2.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Index(string Name, string Email, string Address, string Password)
        {
            if (Name.Equals("") == true) ModelState.AddModelError("NameError", "Enter Your Name");
            if (Email.Equals("") == true) ModelState.AddModelError("EmailError", "Enter Email");
            if (Address.Equals("") == true) ModelState.AddModelError("AddError", "Enter Your Address");
            if (Password.Equals("") == true) ModelState.AddModelError("PassError", "Enter Password");
            return View();
        }
    }
}