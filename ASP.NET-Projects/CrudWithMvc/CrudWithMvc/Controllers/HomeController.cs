using CrudWithMvc.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace CrudWithMvc.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult HomePage()
        {
            return View();
        }
        public ActionResult Insert()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Insert(Program cs)
        {
            string Msg = string.Empty;
            Msg = cs.Insert();

            ViewBag.Msg = Msg;

            return View();
        }
        public ActionResult Read()
        {
            return View();
        }
        public ActionResult Update()
        {
            return View();
        }public ActionResult Delete()
        {
            return View();
        }
    }
}