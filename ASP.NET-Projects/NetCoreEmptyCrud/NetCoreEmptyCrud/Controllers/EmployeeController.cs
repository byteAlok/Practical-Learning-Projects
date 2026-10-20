using Microsoft.AspNetCore.Mvc;
using NetCoreEmptyCrud.Models;

namespace NetCoreEmptyCrud.Controllers
{
    public class EmployeeController : Controller
    {
        public IActionResult Index()
        {
            DbConnection db = new DbConnection();
            List<Student> students = db.GetAll();
            
            return View(students);
        }
        [HttpGet]
        public IActionResult Insert()
        {
            return View();
        }

        [HttpPost]
        public IActionResult Insert(Student cs)
        {
            DbConnection db = new DbConnection();
            string msg = db.InsertData(cs);

            ViewBag.Msg = msg;

            return View();
        }
    }
}
