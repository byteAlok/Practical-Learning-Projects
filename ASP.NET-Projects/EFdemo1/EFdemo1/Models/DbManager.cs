using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;

namespace EFdemo1.Models
{
    public class DbManager : DbContext
    {
        public DbSet<Student> students { get; set; }

    }
}