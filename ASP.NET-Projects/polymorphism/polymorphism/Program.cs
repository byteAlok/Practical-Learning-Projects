using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace polymorphism
{
    internal class Program
    {
        static void Main(string[] args)
        {
            owner o = new owner();
            o.print();
            o.print();
        }
    }
    class employee
    {
        public virtual void print()
        {
            Console.WriteLine("Employee is Login");
        }
    }
    class owner : employee
    {
        public override void print()
        {
            Console.WriteLine("Owner is Login");
        }
    }
}
