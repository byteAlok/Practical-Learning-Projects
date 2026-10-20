using Crud2.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Crud2.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Index(Program obj)
        {
            string msg = string.Empty;
            msg = obj.Insert();

            ViewBag.Msg = msg;

            return View();
        }

        public ActionResult Delete()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Delete(Program obj)
        {
            string msg = string.Empty;
            msg = obj.Delete();

            ViewBag.Msg = msg;

            return View();
        }

        public ActionResult Show()
        {
            Program program = new Program();

            List<Program> list = program.ShowEmployee();

            return View(list);
        }
    }
}