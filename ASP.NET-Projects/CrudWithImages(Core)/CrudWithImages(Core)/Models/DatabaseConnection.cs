using Microsoft.EntityFrameworkCore;

namespace CrudWithImages_Core_.Models
{
    public class DatabaseConnection : DbContext
    {
        public DatabaseConnection(DbContextOptions<DatabaseConnection> options) : base(options) { }
        public DbSet<UserClass> User { get; set; }



    }
}
