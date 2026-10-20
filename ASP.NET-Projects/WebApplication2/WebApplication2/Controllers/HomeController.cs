using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using WebApplication2.Models;
using System.Threading.Tasks;

namespace WebApplication2.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public async Task<ActionResult> Index(string cityName = "Azamgarh")
        {
            var api = new webServe();
            webModel w = await api.GetApi(cityName);

            return View(w);
        }
    }
}