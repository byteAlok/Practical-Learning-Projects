using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data;
using System.Data.SqlClient;

namespace Crud2.Models
{
    public class DbManager
    {
        SqlConnection con = new SqlConnection("data source = DESKTOP-9ANL0FA\\SQLEXPRESS; initial catalog = company; integrated security = true;");
        
        public bool ExecuteQuery(string MyCommand)
        {
            SqlCommand cmd = new SqlCommand(MyCommand, con);

            if(con.State == ConnectionState.Closed)
            {
                con.Open();
            }
            int n = cmd.ExecuteNonQuery();

            if (n > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public DataTable ExecuteReadQuery(string MyCommand)
        {
            SqlDataAdapter adapter = new SqlDataAdapter(MyCommand, con);

            DataTable dataTable = new DataTable();

            adapter.Fill(dataTable);

            return dataTable;
        }
    }
}