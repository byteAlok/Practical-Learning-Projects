using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace array
{
    internal class Program
    {
        static void Main(string[] args)
        {
            string str = " He llo W orld";
            int count = 0;
            foreach (char s in str)
            {
                if (s == ' ')
                {
                    count++;
                }
            }
            Console.WriteLine(count);

            int count2 = 0;
            for (int i = 0; i < str.Length; i++)
            {
                if (str[i] == ' ')
                {
                    count2++;
                }
            }
            Console.WriteLine(count2);
        }-
    }
}
