using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;

namespace crud01
{
    internal class Program
    {
        static void Main(string[] args)
        {
            updateData();
        }
        public static void insertData()
        {
            string cs = "data source = DESKTOP-9ANL0FA\\SQLEXPRESS; initial catalog = school; integrated security = true;";
            SqlConnection conn = new SqlConnection(cs);
            conn.Open();

            if (conn.State == ConnectionState.Open)
            {
                //Console.WriteLine("Database Connected Successfully!");
                Console.Write("Enter Your Name : ");
                string name = Console.ReadLine();

                Console.Write("Enter Your Address : ");
                string add = Console.ReadLine();

                Console.Write("Enter Your Email : ");
                string email = Console.ReadLine();

                string sql = "insert into student ( stu_name, stu_add, stu_email ) values (@name, @add, @email)";
                SqlCommand cmd = new SqlCommand(sql, conn);

                cmd.Parameters.AddWithValue("@name", name);
                cmd.Parameters.AddWithValue("@add", add);
                cmd.Parameters.AddWithValue("@email", email);

                cmd.ExecuteNonQuery();

                Console.WriteLine("\nData Inserted Successfully");

            }
            conn.Close();
        }

        public static void deleteData()
        {
            string cs = "data source = DESKTOP-9ANL0FA\\SQLEXPRESS; initial catalog = school; integrated security = true;";
            SqlConnection conn = new SqlConnection(cs);
            conn.Open();

            if (conn.State == ConnectionState.Open)
            {
                Console.Write("Enter Your Id : ");
                int id = Convert.ToInt32(Console.ReadLine());

                string delSql = "delete from student where stu_id = @id";
                SqlCommand cmd = new SqlCommand(delSql, conn);

                cmd.Parameters.AddWithValue("@id", id);

                cmd.ExecuteNonQuery();

                Console.WriteLine("\nData Deleted Successfully");
            }
            conn.Close();

        }


        public static void readData()
        {
            string cs = "data source = DESKTOP-9ANL0FA\\SQLEXPRESS; initial catalog = school; integrated security = true;";
            SqlConnection conn = new SqlConnection(cs);
            conn.Open();

            if (conn.State == ConnectionState.Open)
            {

                string delSql = "select * from student";
                SqlCommand cmd = new SqlCommand(delSql, conn);

                SqlDataReader dr =  cmd.ExecuteReader();

            while (dr.Read())
                {
                    Console.WriteLine("Id : " + dr["stu_id"] + "\t\tName : " + dr["stu_name"] + "\t\tAddress : " + dr["stu_add"] + "\t\tEmail : " + dr["stu_email"]);
                }

            }
            conn.Close();

        }



        //public static void updateData()
        //{
        //    string cs = "data source = DESKTOP-9ANL0FA\\SQLEXPRESS; initial catalog = school; integrated security = true;";
        //    SqlConnection conn = new SqlConnection(cs);
        //    conn.Open();

        //    if (conn.State == ConnectionState.Open)
        //    {

        //        Console.Write("Enter Your Id : ");
        //        int id = Convert.ToInt32(Console.ReadLine());

        //        string delSql = "select * from student where stu_id = @id";
        //        SqlCommand cmd = new SqlCommand(delSql, conn);

        //        cmd.Parameters.Add("@id", SqlDbType.Int).Value = id;

        //        SqlDataReader dr = cmd.ExecuteReader();

        //        dr.Read();

        //        int iid = Convert.ToInt32(dr["stu_id"]);

        //        Console.WriteLine("Id : " + dr["stu_id"] + "\t\tName : " + dr["stu_name"] + "\t\tAddress : " + dr["stu_add"] + "\t\tEmail : " + dr["stu_email"]);

        //        dr.Close();

        //        Console.Write("\nEnter Your Updated Name : ");
        //        string uName = Console.ReadLine();
        //        Console.Write("Enter Your Updated Address : ");
        //        string uAdd = Console.ReadLine();
        //        Console.Write("Enter Your Updated Email : ");
        //        string uEmail = Console.ReadLine();

        //        string uSql = "update student set stu_name = @uName, stu_add = @uAdd, stu_email = @uEmail where stu_id = @uid";

        //        SqlCommand uCmd = new SqlCommand(uSql, conn);

        //        uCmd.Parameters.AddWithValue("@uid", iid);
        //        uCmd.Parameters.AddWithValue("@uName", uName);
        //        uCmd.Parameters.AddWithValue("@uAdd", uAdd);
        //        uCmd.Parameters.AddWithValue("@uEmail", uEmail);

        //        uCmd.ExecuteNonQuery();

        //        Console.WriteLine("\nData Updation Successfull!");


        //        SqlDataReader udr = cmd.ExecuteReader();
        //        udr.Read();

        //        Console.WriteLine("Id : " + udr["stu_id"] + "\t\tName : " + udr["stu_name"] + "\t\tAddress : " + udr["stu_add"] + "\t\tEmail : " + udr["stu_email"]);


        //    }
        //    conn.Close();

        //}


        public static void updateData()
        {
            string cs = "data source = DESKTOP-9ANL0FA\\SQLEXPRESS; initial catalog = school; integrated security = true;";
            SqlConnection conn = new SqlConnection(cs);
            conn.Open();

            if (conn.State == ConnectionState.Open)
            {

                Console.Write("Enter Your Id : ");
                int id = Convert.ToInt32(Console.ReadLine());

                string delSql = "select * from student where stu_id = @id";
                SqlCommand cmd = new SqlCommand(delSql, conn);

                cmd.Parameters.Add("@id", SqlDbType.Int).Value = id;

                SqlDataReader dr = cmd.ExecuteReader();

                dr.Read();

                int iid = Convert.ToInt32(dr["stu_id"]);

                Console.WriteLine("Id : " + dr["stu_id"] + "\t\tName : " + dr["stu_name"] + "\t\tAddress : " + dr["stu_add"] + "\t\tEmail : " + dr["stu_email"]);

                dr.Close();

                Console.Write("\nEnter Your Updated Name : ");
                string uName = Console.ReadLine();
                Console.Write("Enter Your Updated Address : ");
                string uAdd = Console.ReadLine();
                Console.Write("Enter Your Updated Email : ");
                string uEmail = Console.ReadLine();

                if (uName != "" && uName != null)
                {
                    string uNameSql = $"update student set stu_name = @uName where stu_id = {iid}";
                    SqlCommand uCmd1 = new SqlCommand(uNameSql, conn);
                    uCmd1.Parameters.AddWithValue("@uName", uName);
                    uCmd1.ExecuteNonQuery();
                }
                if (uAdd != "" && uAdd != null)
                {
                    string uAddSql = $"update student set stu_add = @uAdd where stu_id = {iid}";
                    SqlCommand uCmd2 = new SqlCommand(uAddSql, conn);
                    uCmd2.Parameters.AddWithValue("@uAdd", uAdd);
                    uCmd2.ExecuteNonQuery();
                }
                if (uEmail != "" && uEmail != null)
                {
                    string uEmailSql = $"update student set stu_email = @uEmail where stu_id = {iid}";
                    SqlCommand uCmd3 = new SqlCommand(uEmailSql, conn);
                    uCmd3.Parameters.AddWithValue("@uEmail", uEmail);
                    uCmd3.ExecuteNonQuery();
                }

                

                Console.WriteLine("\nData Updation Successfull!");


                SqlDataReader udr = cmd.ExecuteReader();
                udr.Read();

                Console.WriteLine("Id : " + udr["stu_id"] + "\t\tName : " + udr["stu_name"] + "\t\tAddress : " + udr["stu_add"] + "\t\tEmail : " + udr["stu_email"]);


            }
            conn.Close();

        }
    }
}
