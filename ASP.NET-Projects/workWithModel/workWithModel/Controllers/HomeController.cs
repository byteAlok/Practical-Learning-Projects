using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using workWithModel.Models;

namespace workWithModel.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            Program2 obj = new Program2();
            string name = obj.printName("asdf");
            
            ViewBag.name = name;
            
            return View();
        }
    }
}