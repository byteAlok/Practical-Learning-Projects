using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace WebApi2.Controllers
{
    public class MyApiController : ApiController
    {
        public string[] arr = {"Laptop", "CPU", "Monitor", "Printer", "Mouse" };

        [HttpGet]
        [Route("api/MyApi")]
        public IHttpActionResult GetArr()
        {
            //return Json(arr);
            return Ok(arr);
        }
        
    }
}
