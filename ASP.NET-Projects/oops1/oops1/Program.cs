using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Authentication.ExtendedProtection;
using System.Text;
using System.Threading.Tasks;

namespace oops1
{
    internal class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Default Constructor => ------ 'Area' & 'Perimeter' of Rectangle ---------- ");

            rectangle r = new rectangle();
            //r.width = 25;
            //r.length = 20;
            r.rectPerimeter();
            r.rectArea();

            Console.WriteLine();
            Console.WriteLine("Parameterized Constructor =>  ------ 'Area' & 'Perimeter' of Rectangle ---------- ");

            rectangle s = new rectangle(10.5f,8);
            s.rectPerimeter();
            s.rectArea();

            Console.WriteLine();
            Console.WriteLine("Variable initialise through function/method but ----- Single Parameter/Argument");
            rectangle t = new rectangle();
            t.rectWidth(12);
            t.rectLength(15);
            t.rectPerimeter();
            t.rectArea();

            Console.WriteLine();
            Console.WriteLine("Variable initialise through function/method but ----- Double Parameter/Argument");
            rectangle u = new rectangle();
            u.rectSide(5,8);
            u.rectPerimeter();
            u.rectArea();
        }
    }
    
    class rectangle
    {
        //public float length;
        //public float width;

        double length;
        float width;

        public void rectArea()
        {
            Console.WriteLine("Area of rectanle = "+ width * length);
        }
        public void rectPerimeter()
        {
            Console.WriteLine("Perimeter of rectangle = "+ 2 * (length + width));
        }

        public rectangle() { }
        public rectangle(double l, float b)
        {
            length = l; width = b;
        }


        public void rectWidth(float w)
        {
            width = w;
        }
        public void rectLength(float h)
        {
            length = h;
        }

        public void rectSide(float l, float b)
        {
            length = l; width = b;
        }






    }
}
