using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using EmailApp1.Models;

namespace EmailApp1.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Index(Email cs)
        {
            string msg = cs.EmailSend();
            ViewBag.msg = msg;
            return View();
        }
    }
}