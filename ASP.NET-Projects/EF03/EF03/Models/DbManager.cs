using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace EF03.Models
{
    public class DbManager : DbContext
    {
        public DbSet<Product> Product {  get; set; }
    }
}