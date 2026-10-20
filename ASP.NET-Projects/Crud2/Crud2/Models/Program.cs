using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web;

namespace Crud2.Models
{
    public class Program : DbManager
    {
        public int empid { get; set; }
        public string name {  get; set; }
        public string email { get; set; }
        public string address { get; set; }

        string msg;
        string sql;

        public string Insert()
        {
            sql = "insert into employee values ('"+name+"', '"+email+"', '"+address+"')";

            bool res = ExecuteQuery(sql);

            if (res) msg = "Data inserted successfully!";
            else msg = "Data insertion Failed!";

            return msg;
        }

        public string Delete()
        {
            sql = $"delete from employee where empid = {empid}";

            bool res = ExecuteQuery(sql);

            if (res) msg = "Data Deleted successfully!";
            else msg = "Failed!";

            return msg;
        }
        public List<Program> ShowEmployee()
        {
            sql = "select * from employee";
            DataTable data = ExecuteReadQuery(sql);

            List<Program> list = new List<Program>();

            foreach (DataRow dr in data.Rows)
            {
                Program program = new Program();

                program.empid = int.Parse(dr[0].ToString());
                program.name = (dr[1].ToString());
                program.email = (dr[2].ToString());
                program.address = (dr[3].ToString());
                
                list.Add(program);
                
            }
            return list;
        }
    }
}