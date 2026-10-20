using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web;

namespace Crud4.Models
{
    public class Doctor : DbManager
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Email { get; set; }
        public string Address { get; set; }

        string cmd;
        string msg;
        public string Insert()
        {
            cmd = $"insert into doctors values( '{Name}', '{Address}', '{Email}')";

            bool res = ExecuteQuery(cmd);

            if (res) msg = "Data Inserted Successfully!";
            else msg = "Insertion Failed!";

            return msg;
        }

        public List<Doctor> Show()
        {
            cmd = "select * from doctors";

            DataTable dt = GetTable(cmd);

            List<Doctor> list = new List<Doctor> ();

            foreach (DataRow dr in dt.Rows)
            {
                Doctor doc = new Doctor ();

                doc.Id = int.Parse(dr[0].ToString());
                doc.Name = dr[1].ToString();
                doc.Email = dr[2].ToString();
                doc.Address = dr[3].ToString();

                list.Add(doc);
            }

            return list;
        }

    }
}
