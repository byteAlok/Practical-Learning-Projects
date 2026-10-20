using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using demo3.Models;

namespace demo3.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            Program obj = new Program();
            int a = obj.sum(5,10);

            ViewBag.msg = a;

            return View();
        }
        public ActionResult Demo()
        {
            Program2 obj2 = new Program2();
            int b = obj2.subtract(20, 10);

            ViewBag.msg2 = b;
            return View();
        }
    }
}