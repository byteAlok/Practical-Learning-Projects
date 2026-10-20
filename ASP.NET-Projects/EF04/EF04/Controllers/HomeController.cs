using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using EF04.Models;

namespace EF04.Controllers
{
    public class HomeController : Controller
    {
        instituteEntities obj = new instituteEntities();
        public ActionResult Index()
        {
            var cs = obj.Teachers.ToList();
            return View(cs);
        }
        public ActionResult Create()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Create(Teacher t)
        {
            obj.Teachers.Add(t);
            obj.SaveChanges();

            return RedirectToAction("Index");
        }
        public ActionResult Delete(int id)
        {
            var cs = obj.Teachers.Where(x => x.Id == id).FirstOrDefault();

            return View(cs);
        }
        [HttpPost]
        public ActionResult Delete(Teacher trr)
        {
            obj.Entry(trr).State = System.Data.Entity.EntityState.Deleted;
            obj.SaveChanges();

            return RedirectToAction("Index");
        }
        public ActionResult Edit(int id)
        {
            var cs = obj.Teachers.Where(x => x.Id == id).FirstOrDefault();

            return View(cs);
        }
        [HttpPost]
        public ActionResult Edit(Teacher trr)
        {
            obj.Entry(trr).State = System.Data.Entity.EntityState.Modified;
            obj.SaveChanges();

            return RedirectToAction("Index");
        }

        
    }
}