using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace inheritance
{
    internal class Program
    {
        static void Main(string[] args)
        {
            //owner o = new owner();
            //o.empLogin();
            //o.ownLogin();

            example exp = new example();
            exp.exp();
            exp.ownLogin();
            exp.empLogin();
        }
    }
    class employee 
    {
        public void empLogin()
        {
            Console.WriteLine("Employee is Login");
        }
    }
    class owner : employee
    {
        public void ownLogin()
        {
            Console.WriteLine("Owner is Login");
        }
    }
    class example : owner
    {
        public void exp()
        {
            Console.WriteLine("Example Class");
        }
    }
}
