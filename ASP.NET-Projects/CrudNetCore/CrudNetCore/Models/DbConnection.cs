using Microsoft.Data.SqlClient;

namespace CrudNetCore.Models
{
    public class DbConnect
    {
        string cs = "Server=DESKTOP-9ANL0FA\\SQLEXPRESS;Database=school01;Trusted_Connection=True;Encrypt=False;";
        //string cs = "Server=DESKTOP-9ANL0FA\\SQLEXPRESS;Database=school01;Trusted_Connection=True;TrustServerCertificate=True;";

        public List<Student> GetAll()
        {
            List<Student> list = new List<Student>();

            using (SqlConnection con = new SqlConnection(cs))
            {

                SqlCommand cmd = new SqlCommand("show", con)
                {
                    CommandType = System.Data.CommandType.StoredProcedure
                };
                con.Open();

                SqlDataReader dr = cmd.ExecuteReader();

                while (dr.Read())
                {
                    var student = new Student();
                    student.Id = (int)dr["Id"];
                    student.Name = (string)dr["Name"];
                    student.Address = (string)dr["Address"];
                    student.Email = (string)dr["Email"];

                    list.Add(student);
                }

            }
            return list;
        }

        public string InsertData(Student s)
        {
            using (SqlConnection con = new SqlConnection(cs))
            {
                SqlCommand cmd = new SqlCommand("insertdata", con);

                cmd.CommandType = System.Data.CommandType.StoredProcedure;

                con.Open();

                cmd.Parameters.AddWithValue("@Name", s.Name);
                cmd.Parameters.AddWithValue("@Address", s.Address);
                cmd.Parameters.AddWithValue("@Email", s.Email);

                int n = cmd.ExecuteNonQuery();

                return n > 0 ? "Data Inserted Successfull" : "Failed";

            }
        }
        
    }
}
