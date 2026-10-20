using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace tempData.Controllers
{
    public class HospitalController : Controller
    {
        public ActionResult Home()
        {
            return View();
        }
        public ActionResult About()
        {
            return View();
        }
    }
}