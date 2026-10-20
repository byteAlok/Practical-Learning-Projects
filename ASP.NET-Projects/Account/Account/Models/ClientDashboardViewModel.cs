using Account.Models;

namespace Account.ViewModels
{
    public class ClientDashboardViewModel
    {
        public UserClass Client { get; set; }

        public List<JobPostClass> RecentJobs { get; set; }

        public int TotalJobsPosted { get; set; }

        public int ActiveJobs { get; set; }
    }
}