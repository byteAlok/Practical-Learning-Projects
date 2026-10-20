using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.InteropServices;
using System.Threading.Tasks;
using System.Web;
using System.Web.Mvc;
using System.Web.Services;
using WebApplication1.Models;

namespace WebApplication1.Controllers
{
    public class HomeController : Controller
    {
        
        public async Task<ActionResult> Index(string city="Azamgarh")
        {
            var api = new WebServices();

            Web n = await api.GetApi(city);

            return View(n);
        }
        
    }
}