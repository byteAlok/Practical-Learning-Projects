using Crud3.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Crud3.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            Employee Emp2 = new Employee();
            List<Employee> list = Emp2.ShowEmployee();

            return View(list);
        }

        public ActionResult Insert()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Insert(Employee Emp)
        {
            string s = string.Empty;
            s = Emp.Insert();

            ViewBag.Msg = s;

            return View();
        }

        public ActionResult Update(int id)
        {
            Employee emp = new Employee();
            Employee emp2 = emp.GetSpecific(id);
            return View(emp2);
        }

        [HttpPost]
        public ActionResult Update(Employee emp)
        {
            string msg = emp.Update();
            TempData["Msg"] = msg;
            return RedirectToAction("Index");
        }

       
        public ActionResult Delete(int id)
        {
            Employee emp = new Employee();
            string msg = emp.Delete(id);

            TempData["Msg"] = msg;  
            return RedirectToAction("Index");
        }
       


    }
}