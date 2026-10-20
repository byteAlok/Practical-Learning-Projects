using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace question
{
    internal class Program
    {
        static void printName(string str)
        {
            Console.WriteLine(str);
        }

        static void len()
        {
            string[] a = { "Alok", "Aman", "Amit" };
            int count = 0;
            foreach (string temp in a) if (temp != " ") count++;




                Console.WriteLine("Body");
            
            Console.WriteLine(count);
        }

        static void Main(string[] args)
        {
            len();
        }
    }
}
