using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace MakeApi.Controllers
{
    public class HelloController : ApiController
    {
        
        [HttpGet]
        [Route("api/Hello")]

        public IHttpActionResult GetMessage()
        {
            return Ok("This is your first api");
        }
        [HttpGet]
        [Route("api/Hello/{name}")]

        public IHttpActionResult GetMessage(string name)
        {
            return Ok($"Hello {name} : This is your first api");
        }
    }
}
