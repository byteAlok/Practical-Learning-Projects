using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data;
using System.Data.SqlClient;

namespace Crud4.Models
{
    public class DbManager
    {
        SqlConnection con = new SqlConnection("data source = DESKTOP-9ANL0FA\\SQLEXPRESS; initial catalog = Hospital; integrated security = true;");

        public bool ExecuteQuery(string MyCommond)
        {
            SqlCommand cmd = new SqlCommand(MyCommond, con);

            con.Open();
            int n = cmd.ExecuteNonQuery();

            if (n > 0) return true;
            return false;
        }

        public DataTable GetTable(string MyCommand)
        {
            SqlDataAdapter adapter = new SqlDataAdapter(MyCommand, con);

            DataTable dt = new DataTable();

            adapter.Fill(dt);

            return dt;
        }
        
    }
}