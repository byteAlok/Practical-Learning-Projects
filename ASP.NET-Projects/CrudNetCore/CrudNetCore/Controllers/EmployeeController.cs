using CrudNetCore.Models;
using Microsoft.AspNetCore.Mvc;
using System.Data.Common;

namespace CrudNetCore.Controllers
{
    public class EmployeeController : Controller
    {
        public IActionResult Index()
        {
            DbConnect db = new DbConnect();
            List<Student> students = db.GetAll();
            return View(students);
        }
    }
}
