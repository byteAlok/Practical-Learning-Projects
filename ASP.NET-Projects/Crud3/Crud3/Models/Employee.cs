using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web;

namespace Crud3.Models
{
    public class Employee : DbManager
    {
        public int empid { get; set; }
        public string name { get; set; }
        public string email { get; set; }
        public string address { get; set; }

        string msg;
        string sql;
        public List<Employee> ShowEmployee()
        {
            sql = "select * from employee";

            DataTable Table = ExecuteReadQuery(sql);

            List<Employee> Emp = new List<Employee>();

            foreach (DataRow dr in Table.Rows)
            {
                Employee obj = new Employee();

                obj.empid = int.Parse(dr[0].ToString());
                obj.name = dr[1].ToString();
                obj.email = dr[2].ToString();
                obj.address = dr[3].ToString();

                Emp.Add(obj);
            }
            return Emp;
        }

        public string Insert()
        {
            sql = $"insert into employee values('{name}', '{email}', '{address}')";

            bool res = ExexuteMyQuery(sql);

            if (res) msg = "Data Inserted Successfully!";
            else msg = "Failed!";

            return msg;
        }



        public string Update()
        {
            sql = $"update employee set empname = '{name}', empemail = '{email}', empadd = '{address}' where empid = '{empid}'";

            bool res = ExexuteMyQuery(sql);

            if (res) msg = "Updation Successfull!";
            else msg = "Updation Failed!";

            return msg;
        }
        internal Employee GetSpecific( int cid )
        {
            sql = $"select * from employee where empid = '{cid}'";

            DataTable dt = ExecuteReadQuery(sql);

            Employee Emp = new Employee();

            if (dt.Rows.Count > 0)
            {
                Emp.empid = int.Parse(dt.Rows[0][0].ToString());
                Emp.name = dt.Rows[0][1].ToString();
                Emp.email = dt.Rows[0][2].ToString();
                Emp.address = dt.Rows[0][3].ToString();
            }

            return Emp;
        }

        public string Delete(int id)
        {
            sql = $"delete from employee where empid = '{id}'";
            bool res = ExexuteMyQuery(sql);

            if (res) msg = "Record Deleted Successfully!";
            else msg = "Delete Failed!";

            return msg;
        }


    }
}