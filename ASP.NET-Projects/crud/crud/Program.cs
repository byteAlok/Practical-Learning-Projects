using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;
using System.Reflection.Emit;

namespace crud
{
    internal class Program
    {
        static void Main(string[] args)
        {
            insertData();
        }
        public static void insertData()
        {
            string db = "school";
            string cs = $"data source = DESKTOP-9ANL0FA\\SQLEXPRESS; initial catalog = {db}; integrated security = true";

            using (SqlConnection con2 = new SqlConnection(cs))
            {
                con2.Open();


                if (con2.State == ConnectionState.Open)
                {
                    //Console.WriteLine("Database Connected Successfull");
                    Console.Write("Enter Your Name : ");
                    string name = Console.ReadLine();

                    Console.Write("Enter Your Address : ");
                    string add = Console.ReadLine();

                    Console.Write("Enter Your Email : ");
                    string email = Console.ReadLine();

                    string sql = "INSERT INTO STUDENT(stu_name, stu_add, stu_email) VALUES(@name, @add, @email)";

                    using (SqlCommand cmd = new SqlCommand(sql, con2))
                    {

                        cmd.Parameters.Add("@name", SqlDbType.VarChar, 5).Value = name;
                        cmd.Parameters.AddWithValue("@add", add);
                        cmd.Parameters.AddWithValue("@email", email);

                        cmd.ExecuteNonQuery();
                    }
                    Console.WriteLine("\nData inserted successfully.");
                }
            }
        }






        
    }
}
