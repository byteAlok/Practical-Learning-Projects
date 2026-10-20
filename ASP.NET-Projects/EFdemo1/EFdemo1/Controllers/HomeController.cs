using EFdemo1.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace EFdemo1.Controllers
{
    public class HomeController : Controller
    {
        DbManager con = new DbManager();
        // GET: Home
        public ActionResult Index()
        {
            var db = con.students.ToList();
            return View(db);
        }
    }
}