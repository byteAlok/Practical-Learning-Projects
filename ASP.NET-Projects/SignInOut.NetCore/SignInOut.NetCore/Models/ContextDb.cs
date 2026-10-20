using Microsoft.EntityFrameworkCore;

namespace SignInOut.NetCore.Models
{
    public class ContextDb : DbContext
    {
        public ContextDb(DbContextOptions<ContextDb> options) : base(options)
        {
        }
        public DbSet<UserClass> Users { get; set; }
    }
}
