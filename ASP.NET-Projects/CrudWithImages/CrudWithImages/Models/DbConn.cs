using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace CrudWithImages.Models
{
    public class DbConn : DbContext
    {
        public DbSet<Student> Students { get; set; }

    }
}