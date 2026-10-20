using Crud4.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Crud4.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Index(Doctor cs)
        {
            string msg = cs.Insert();

            ViewBag.msg = msg;

            return View();
        }

        public ActionResult Show(Doctor cs)
        {
            //Doctor cs = new Doctor();
            List<Doctor> list = cs.Show();

            return View(list);
        }
    }
}