using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace workWithModel.Models
{
    public class Program
    {
        public static string Cap(string name)
        {
            if (string.IsNullOrEmpty(name)) return name;
            return char.ToUpper(name[0]) + name.Substring(1);
        }
    }
}