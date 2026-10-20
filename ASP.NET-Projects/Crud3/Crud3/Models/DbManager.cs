using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data;
using System.Data.SqlClient;

namespace Crud3.Models
{
    public class DbManager
    {
        SqlConnection con = new SqlConnection("data source = DESKTOP-9ANL0FA\\SQLEXPRESS; initial catalog = company; integrated security = true;");

        public bool ExexuteMyQuery( string MyCommand )
        {
            SqlCommand cmd = new SqlCommand( MyCommand, con );

            if (con.State == ConnectionState.Closed)
            {
                con.Open();
            }
            
            int n = cmd.ExecuteNonQuery();

            if (n > 0) return true;
            return false;
        }

        public DataTable ExecuteReadQuery( string MyCommand )
        {
            SqlDataAdapter Adaptor = new SqlDataAdapter(MyCommand, con);

            DataTable Data = new DataTable();

            Adaptor.Fill( Data );

            return Data;
        }



    }
}