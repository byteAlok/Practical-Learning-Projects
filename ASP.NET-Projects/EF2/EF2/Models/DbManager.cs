using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;

namespace EF2.Models
{
    public class DbManager : DbContext
    {
        public DbSet<Teacher> Teachers { get; set; }
    }
}