using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace EF2.Models
{
    public class Teacher
    {
        [Key]
        public int id { get; set; }
        public string name { get; set; }
        public string address { get; set; }

        public string email { get; set; }

        public string mob { get; set; }
    }
}