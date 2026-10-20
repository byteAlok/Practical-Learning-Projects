using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace CrudWithMvc.Models
{
    public class Program : DbManager
    {
        public string ProductName { get; set; }
        public int Price { get; set; }
        public int Cost { get; set; }
        public int Qty { get; set; }

        string cmd;
        string msg;
        public string Insert()
        {
            //cmd = "insert into product values ('"+ProductName+ "', '"+Price+ "', '" + Cost+"', '"+Qty+"')";
            cmd = $"insert into product values ('{ProductName}','{Price}', '{Cost}','{Qty}')";

            bool res = ExexuteMyNoneQuery(cmd);

            if (res) msg = "Data Inserted Successfully";
            
            else msg = "Data Insertion Failed!";

            return msg;
        }
    }
}