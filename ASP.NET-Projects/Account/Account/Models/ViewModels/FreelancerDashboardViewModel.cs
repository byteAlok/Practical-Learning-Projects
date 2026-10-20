namespace Account.Models.ViewModels
{
    public class FreelancerDashboardViewModel
    {
        public UserClass? Freelancer { get; set; }

        public int ActiveBids { get; set; }

        public int OngoingJobs { get; set; }

        public int CompletedJobs { get; set; }

        public List<BidClass>? RecentBids { get; set; }

        public List<PortfolioPost>? PortfolioPosts { get; set; }
    }
}