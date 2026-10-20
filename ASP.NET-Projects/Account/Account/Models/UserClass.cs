using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;
using System.Security.Cryptography;

namespace Account.Models
{
    public class UserClass
    {

        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int Id { get; set; }

        [Required]
        [StringLength(50, ErrorMessage = "Adminname can't exceed 30 characters")]
        public string FullName { get; set; }

       

        [Required]
        [EmailAddress(ErrorMessage = "Enter Valid Email")]
        public string Email { get; set; }

        [Required]
        [DataType(DataType.Password)]
        [StringLength(20, MinimumLength = 8, ErrorMessage = "Password must be between 8 and 20")]
        public string Password { get; set; }

        [NotMapped]
        [DataType(DataType.Password)]
        [Compare("Password", ErrorMessage = "Password and Confirm Password do not match!")]
        public string? ConfirmPassword { get; set; }  // nullable since not stored in DB

        [Required]
        public string Role { get; set; } // "Freelancer" or "Client"

        // Freelancer specific fields
        public string? Skills { get; set; }
        public string? Bio { get; set; }
        public string? Location { get; set; }
        public double? Rating { get; set; }

        public string? ProfilePhotoPath { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        // Navigation properties
       public virtual ICollection<JobPostClass>? JobsPosted { get; set; }
        //public virtual ICollection<Bid>? Bids { get; set; }
        //public virtual ICollection<PortfolioPost>? PortfolioPosts { get; set; }
    }
}
