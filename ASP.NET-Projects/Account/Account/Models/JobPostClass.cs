using System.ComponentModel.DataAnnotations;

namespace Account.Models
{
    public class JobPostClass
    {
        [Key]
        public int Id { get; set; }

        [Required]
        [Display(Name = "Job Title")]
        public string? JobTitle { get; set; }

        [Required]
        [Display(Name = "Job Category")]
        public string? JobCategory { get; set; }

        [Required]
        [Display(Name = "Job Description")]
        public string? JobDescription { get; set; }

        [Display(Name = "Budget")]
        public decimal? Budget { get; set; }

        [Display(Name = "Delivery Time")]
        public DateTime? DeliveryTime { get; set; }

        [Display(Name = "Location Type")]
        public string? LocationType { get; set; }

        // Optional Extra Fields

        public DateTime CreatedAt { get; set; } = DateTime.Now;

        public string Status { get; set; } = "Open";

        // Foreign Key (Client/User)

        public int ClientId { get; set; }

        public UserClass? Client { get; set; }
    }
}