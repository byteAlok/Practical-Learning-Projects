using EF2.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace EF2.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        DbManager db = new DbManager();
        public ActionResult Index()
        {
            var list = db.Teachers.ToList();
            return View(list);
        }
        public ActionResult Create()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Create(Teacher cs)
        {
            db.Teachers.Add(cs);
            db.SaveChanges();
            return View();
        }

    }
}