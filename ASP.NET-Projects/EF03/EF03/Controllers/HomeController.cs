using EF03.Models;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace EF03.Controllers
{
    public class HomeController : Controller
    {
        DbManager db = new DbManager();
        public ActionResult Index()
        {
            var table = db.Product.ToList();
            return View(table);
        }
        
        public ActionResult Create()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Create(Product p)
        {
            db.Product.Add(p);
            int n = db.SaveChanges();

            if (n > 0)
            {
                TempData["Msg"] = "Data Inserted Successfully";

                return RedirectToAction("Index");
            }
            return View();
        }

        public ActionResult Edit(int id)
        {
            var cs = db.Product.Where(x => x.Id == id).FirstOrDefault();

            return View(cs);
        }
        [HttpPost]
        public ActionResult Edit(Product pr)
        {
            db.Entry(pr).State = EntityState.Modified;
            db.SaveChanges();

            return RedirectToAction("Index");
        }
        public ActionResult Delete(int id)
        {
            var cs = db.Product.Where(x => x.Id == id).FirstOrDefault();

            return View(cs);
        }
        [HttpPost]
        public ActionResult Delete(Product pr)
        {
            db.Entry(pr).State = EntityState.Deleted;
            db.SaveChanges();

            return RedirectToAction("Index");
        }

        public ActionResult Details(int id)
        {
            var data = db.Product.Where(x => x.Id == id).FirstOrDefault();

            return View(data);
        }

    }
}