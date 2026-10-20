using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace LoginRegister.Net.Models
{
    public class User
    {
        [Required (ErrorMessage = "Enter Your Id")]
        public int Id { get; set; }
        [Required (ErrorMessage = "Enter Your Name")]
        public string Name { get; set; }
        [Required (ErrorMessage = "Enter Your UserName")]
        public string UserName { get; set; }
        [Required (ErrorMessage = "Enter Your Password")]
        public string Password { get; set; }
    }
}