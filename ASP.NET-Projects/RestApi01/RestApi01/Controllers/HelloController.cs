using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace RestApi01.Controllers
{
    public class HelloController : ApiController
    {
        [HttpGet]
        [Route("api/Hello/{name}")]

        
        public IHttpActionResult GetApi(string name)
        {
            var Student = new
            {
                id = 1,
                Name = $"{name}",
                std = "12th",
                Subjects = new List<string> { "Hindi", "English", "Mathematics", "Physics", "Chemistry" }
            };

            return Ok(Student);
        }
    }
}
