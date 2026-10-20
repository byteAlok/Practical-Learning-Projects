using CrudWithImages.Models;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace CrudWithImages.Controllers
{
    public class HomeController : Controller
    {
        DbConn db = new DbConn();
        // GET: Home
        public ActionResult Create()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Create(Student stu, HttpPostedFileBase file)
        {
            if (file != null && file.ContentLength > 0)
            {
                try
                {
                    string filename = Path.GetFileName(file.FileName);
                    string folder = Server.MapPath("~/Upload3/");

                    // Ensure folder exists
                    if (!Directory.Exists(folder))
                    {
                        Directory.CreateDirectory(folder);
                    }

                    string path = Path.Combine(folder, filename);

                    using (var stream = new FileStream(filePath, FileMode.Create))
                    {
                        file.CopyTo(stream);
                    }
                    file.SaveAs(path);

                    stu.filePath = filename;
                }
                catch (Exception ex)
                {
                    ViewBag.Error = "File not saved: " + ex.Message;
                }
            }

            db.Students.Add(stu);
            db.SaveChanges();

            return View();
        }
    }
}