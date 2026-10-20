using Microsoft.AspNetCore.Mvc;
using InstallingCDNFILE.Models;

namespace InstallingCDNFILE.Controllers
{
    public class HomeController : Controller
    {
        public IActionResult Index()
        {
            var obj = new Student();
            obj.Id = 1;
            obj.Name = "Alok";
            obj.Address = "Azamgarh";

            return View(obj);
        }
        //[HttpPost]
        //public IActionResult Index(Student obj,int id, string name, string add)
        //{
        //    obj.Id=id;
        //    obj.Name =name;
        //    obj.Address = add;

        //    return View(obj);
        //}
        [HttpPost]
        public IActionResult Index(Student obj)
        {
            var obj2 = new Student();
            obj2.Id = obj.Id;
            obj2.Name = obj.Name;
            obj2.Address = obj.Address;

            return View(obj2);
        }

    }
}
