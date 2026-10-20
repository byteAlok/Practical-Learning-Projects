using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace Form.Models
{
    public class MyForm
    {
        [Range(5,10)]
        public int Id { get; set; }
        [Required(ErrorMessage = "Please Enter Name")]
        [StringLength(5)]
        public string Name { get; set; }
        [Required, RegularExpression(@"^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$")]

        public string Email { get; set; }
        [Required]
        public string Address { get; set; }
        [Required]
        public string Number { get; set; }


    }
}