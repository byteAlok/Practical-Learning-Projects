using Microsoft.Data.SqlClient;

namespace NetCoreEmptyCrud.Models
{
    public class DbConnection
    {
        public string cs = "Server=DESKTOP-9ANL0FA\\SQLEXPRESS;database=school01;Trusted_Connection=true";

        public List<Student> GetAll()
        { 
            List<Student> list = new List<Student>();

            using (SqlConnection con = new SqlConnection(cs))
            {
                SqlCommand cmd = new SqlCommand("show", con);
                cmd.CommandType = System.Data.CommandType.StoredProcedure;

                con.Open();
                SqlDataReader dr = cmd.ExecuteReader();

                while (dr.Read())
                {
                    Student stu = new Student();

                    stu.Id = Convert.ToInt16(dr["ID"]);
                    stu.Name = dr["Name"].ToString();
                    stu.Address = dr["Address"].ToString();
                    stu.Email = dr["Email"].ToString();

                    list.Add(stu);
                }
                return list;
            }
        }

        public string InsertData(Student s)
        {

            using (SqlConnection con = new SqlConnection(cs))
            {
                SqlCommand cmd = new SqlCommand("insertdata", con);
                cmd.CommandType = System.Data.CommandType.StoredProcedure;

                cmd.Parameters.AddWithValue("@Name", s.Name);
                cmd.Parameters.AddWithValue("@Address", s.Address);
                cmd.Parameters.AddWithValue("@Email", s.Email);

                con.Open();

                int n = cmd.ExecuteNonQuery();

                if (n > 0) return "Data inserted successfully";
                else return "Data insertion failed!";
            }
        }
    }
}
