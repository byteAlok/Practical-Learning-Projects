using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using NewApiApp.Models;
using System.Threading.Tasks;


namespace NewApiApp.Controllers
{
    public class HomeController : Controller
    {
        public async Task<ActionResult> Index(string cityName = "India")
        {
            var api = new WebNews();
            IEnumerable<Web> n = await api.GetApi(cityName);

            ViewBag.CityName = cityName;
            
            return View(n);
        }
        
    }
}