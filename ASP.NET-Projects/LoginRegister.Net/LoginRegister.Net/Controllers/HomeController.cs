using LoginRegister.Net.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace LoginRegister.Net.Controllers
{
    public class HomeController : Controller
    {
        ContextDb db = new ContextDb();
        // GET: Home
        public ActionResult Index()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Index(User user)
        {
            db.User.Add(user);
            db.SaveChanges();

            return RedirectToAction("Login");
        }
        public ActionResult Login()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Login(User user)
        {
            var usr = db.User.FirstOrDefault(u => u.UserName == user.UserName && u.Password == user.Password);
            
            if (usr != null)
            {
                Session["Uname"] = usr.UserName;
                Session["Id"] = usr.Id;

                return RedirectToAction("Welcome");
            }
            else
            {
                ViewBag.Msg = "Incorrect UserName or Password";
                return View();
            }  
        }
        public ActionResult Welcome()
        {
            //if (Session["Uname"] != null)
            //{
            //    return View();
            //}
            //return RedirectToAction("Login");
            return View();
        }
        [HttpPost]
        public ActionResult Logout()
        {
            Session.Clear();
            return RedirectToAction("Login");
        }
    }
}