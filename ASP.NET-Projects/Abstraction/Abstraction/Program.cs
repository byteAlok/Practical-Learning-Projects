using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Abstraction
{
    internal class Program
    {
        static void Main(string[] args)
        {
            a obj = new a();
            obj.sleep();
            obj.animalSound();

        }
    }
    abstract class animal
    {
            public void sleep()
        {
            Console.WriteLine("Animal is sleeping");
        }
        public abstract void animalSound();

    }
    class a : animal
    {
        public override void animalSound()
        {
            Console.WriteLine("Animal is barking");
        }
    }

}
