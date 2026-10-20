using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace FirstApi.Controllers
{
    public class StudentDataController : ApiController
    {
        public string[] students = {"Aman", "Alok", "Ram"};

        public string[] GetStudentData()
        {
            return students;
        }

        public string GetStudent(int id)
        {
            return students[id];
        }
    }
}
