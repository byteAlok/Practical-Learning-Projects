using System.ComponentModel.DataAnnotations;

namespace SignInOut.NetCore.Models
{
    public class UserClass
    {
        //[Required(ErrorMessage = "Enter Your Id")]
        [Key]
        public int Id { get; set; }
        //[Required(ErrorMessage = "Enter Your Name")]
        public string Name { get; set; }
        //[Required(ErrorMessage = "Enter Your UserName")]
        public string UserName { get; set; }
        //[Required(ErrorMessage = "Enter Your Password")]
        public string Password { get; set; }
    }
}
