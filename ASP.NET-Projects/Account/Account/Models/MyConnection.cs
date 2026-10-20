using Microsoft.EntityFrameworkCore;

namespace Account.Models
{
    public class MyConnection : DbContext
    {
        public MyConnection(DbContextOptions<MyConnection> options) : base(options) { }
        public DbSet<UserClass> User { get; set; }
        public DbSet<JobPostClass> PostJob { get; set; }

        public DbSet<BidClass> Bids { get; set; }
        public DbSet<PortfolioPost> PortfolioPosts { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            base.OnModelCreating(modelBuilder);

            modelBuilder.Entity<BidClass>()
                .HasOne(b => b.Freelancer)
                .WithMany()
                .HasForeignKey(b => b.FreelancerId)
                .OnDelete(DeleteBehavior.NoAction);

            modelBuilder.Entity<BidClass>()
                .HasOne(b => b.JobPost)
                .WithMany()
                .HasForeignKey(b => b.JobPostId)
                .OnDelete(DeleteBehavior.NoAction);
        }

    }
}
