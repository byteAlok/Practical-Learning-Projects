using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace EF03.Models
{
    public class Product
    {
        [Key]
        public int Id { get; set; }
        public string Name { get; set; }
        public string SellPrice { get; set; }
        public string CostPrice { get; set; }
        public int Qty { get; set; }
    }
}