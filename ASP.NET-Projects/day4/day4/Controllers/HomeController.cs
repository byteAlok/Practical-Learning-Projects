using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography.X509Certificates;
using System.Web;
using System.Web.Mvc;

namespace day4.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            return View();
        }
        public ActionResult Home()
        {
            int a = 5;
            int b = 10;
            int sum = a + b;

            ViewBag.sum = sum;
            return View();
        }
        public ActionResult About()
        {
            string name = "Alok";

            TempData["nm"] = name;
            return View();
        }
        public ActionResult Contact()
        {
            TempData["key1"] = "C#";
            return View();
        }
        public object PrintName()
        {
            return TempData["key1"];
        }
        public ActionResult Services()
        {
         
            return View();
        }
       
    }
}
