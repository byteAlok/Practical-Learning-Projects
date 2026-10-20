using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using Validate3.Models;

namespace Validate3.Controllers
{
    public class HomeController : Controller
    {
         //GET: Home
        public ActionResult Index()
        {
            Program obj = new Program();
            ViewBag.msg =  obj.PrintName("Alok");
            return View();
        }
        public ActionResult Form()
        {

            return View();
        }
    }
}