using CrudWithImages_Core_.Models;
using Microsoft.AspNetCore.Mvc;

namespace CrudWithImages_Core_.Controllers
{
    public class UserController(DatabaseConnection db) : Controller
    {
        private readonly DatabaseConnection _db = db;

        //public UserController(DatabaseConnection db) { _db = db; }

        public IActionResult Create()
        {
            return View();
        }
        [HttpPost]
        public IActionResult Create(UserClass usr, IFormFile file)
        {
            if (file !=  null && file.Length > 0)
            {
                string createFolder = Path.Combine(Directory.GetCurrentDirectory(), "PrivateUpload");

                if (!Directory.Exists(createFolder))
                {
                    Directory.CreateDirectory(createFolder);
                }

                string filename = Path.Combine(file.FileName);
                string filePath = Path.Combine(createFolder, filename);

                using (var stream = new FileStream(filePath, FileMode.Create))
                {
                    file.CopyTo(stream);
                }
                usr.UserImage = filename;
            }
            _db.User.Add(usr);
            _db.SaveChanges();
            return View();
        }
        public IActionResult ReadTable()    
        {
            var UserLists = _db.User.ToList();
            return View(UserLists);
        }
        public IActionResult Update()
        {
            return View();
        }
        public IActionResult Delete()
        {
            return View();
        }
    }
}
