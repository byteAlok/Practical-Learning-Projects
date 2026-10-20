using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace api3.Controllers
{
    public class EmpController : ApiController
    {
        string[] Employee = { "Aman", "Ram", "Shyam","Mohan" };
        //[HttpGet]
        public string[] GetEmp()
        {
            return Employee;
        }

        //[HttpGet]
        //[Route("api/Emp1")]
        //public string [] Emp1()
        //{
        //    return Employee;
        //}

        //[HttpGet]
        //[Route("api/Emp2")]
        //public string[] Emp2()
        //{
        //    return Employee;
        //}
    }
}
