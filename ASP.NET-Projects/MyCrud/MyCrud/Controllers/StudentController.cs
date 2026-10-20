using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Security.Cryptography.X509Certificates;
using System.Web;
using System.Web.Mvc;

using MyCrud.Models;

namespace MyCrud.Controllers
{
    public class StudentController : Controller
    {
        private readonly string cs = ConfigurationManager.ConnectionStrings["MyDatabase"].ConnectionString;

        [HttpGet]
        public ActionResult Insert()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Insert(Student NewStudent)
        {

            string Name = NewStudent.Name;
            string Email = NewStudent.Email;
            string Address = NewStudent.Address;


            

            try
            {
                using (SqlConnection con = new SqlConnection(cs))
                {
                    con.Open();
                    //ViewBag.msg = "Database Connected Successfully!";

                    string sql = "insert into student(stu_name, stu_add, stu_email) values (@name, @add, @email)";

                    SqlCommand cmd = new SqlCommand(sql, con);

                    cmd.Parameters.AddWithValue("@name", Name);
                    cmd.Parameters.AddWithValue ("@add", Address);
                    cmd.Parameters.AddWithValue ("@email", Email);

                    int row = cmd.ExecuteNonQuery();

                    if (row > 0)
                    {
                        TempData["msg"] = "Data Inserted Successfully!";
                    }

                }
            }
            catch (Exception ex)
            {
                ViewBag.msg = "Catched Error : "+ex.Message.ToString();
            }

            return RedirectToAction("Show");
        }
        [HttpGet]
        public ActionResult Show()
        {
            string cs = ConfigurationManager.ConnectionStrings["MyDatabase"].ConnectionString;

            List<Student> StudentList = new List<Student>();

            try
            {
                using (SqlConnection con = new SqlConnection(cs))
                {
                    con.Open();

                    string sql = "select * from student";

                    SqlCommand cmd = new SqlCommand(sql, con);
                    SqlDataReader reader = cmd.ExecuteReader();

                    

                    while (reader.Read())
                    {
                        StudentList.Add(new Student
                        { 
                            Id = Convert.ToInt32(reader["stu_id"]),
                            Name = reader["stu_name"].ToString(),
                            Address = reader["stu_add"].ToString(),
                            Email = reader["stu_email"].ToString()
                        });
                    }
                    reader.Close();
                  

                }
            }
            catch (Exception ex)
            {
                ViewBag.msg = "Catched Error : " + ex.Message.ToString();
            }

            return View(StudentList);
        }
        
        public ActionResult Update()
        {
            return View();
        }
        public ActionResult Delete()
        {
            return View();
        }
    }
}