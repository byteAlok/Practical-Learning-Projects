using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace LoginRegister.Net.Models
{
    public class ContextDb : DbContext
    {
        public DbSet<User> User { get; set; }
    }
}
