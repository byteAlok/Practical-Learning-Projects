using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace Account.Models
{
    public class BidClass
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int Id { get; set; }

        // Foreign Key for Job Post
        [Required]
        public int JobPostId { get; set; }

        [ForeignKey("JobPostId")]
        public virtual JobPostClass? JobPost { get; set; }

        // Foreign Key for Freelancer(User)
        [Required]
        public int FreelancerId { get; set; }

        [ForeignKey("FreelancerId")]
        public virtual UserClass? Freelancer { get; set; }

        // Bid Amount
        [Required]
        [Range(1, 1000000)]
        public decimal Amount { get; set; }

        // Proposal / Cover Letter
        [Required]
        [StringLength(1000)]
        public string CoverLetter { get; set; }

        // Bid Status
        public string Status { get; set; } = "Pending";
        // Pending, Accepted, Rejected

        // Created Date
        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;
    }
}