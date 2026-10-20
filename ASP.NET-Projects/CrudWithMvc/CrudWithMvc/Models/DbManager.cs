using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data;
using System.Data.SqlClient;

namespace CrudWithMvc.Models
{
    public class DbManager
    {

        SqlConnection con = new SqlConnection("data source = DESKTOP-9ANL0FA\\SQLEXPRESS; initial catalog = ProductDb; integrated security = true;");

        public bool ExexuteMyNoneQuery(string MyCommand)
        {
            SqlCommand cmd = new SqlCommand(MyCommand, con);

            if (con.State == ConnectionState.Closed)
            { 
                con.Open();
            }
            int n = cmd.ExecuteNonQuery();

            if (n > 0) return true;
            else return false;

        }
    }
}