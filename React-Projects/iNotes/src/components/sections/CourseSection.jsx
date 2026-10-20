import React from "react";
import { Link, Outlet } from "react-router-dom";
import { RegisterBtn } from "../common/Templates";

const courses = [
  { name: "HTML5", paramName: "HTML" },
  { name: "CSS (Modern)", paramName: "CSS" },
  { name: "JavaScript", paramName: "JavaScript" },
  { name: "PHP", paramName: "PHP" },
  { name: "SQL (MySQL)", paramName: "MySQL" },
  { name: "React Js", paramName: "React-Js" },
  { name: "NoSQL (MongoDB)", paramName: "MongoDb" },
  { name: "Node Js", paramName: "Node-Js" },
  { name: "Express Js", paramName: "Express-Js" },
  { name: "Next Js", paramName: "Next-Js" },
  { name: "Git & GitHub", paramName: "Git-GitHub" },
  { name: "C# Programming", paramName: "C#" },
  { name: ".NET Web-Application (MVC)", paramName: "ASP.NET" },
  { name: ".NET Core Web-Application (MVC)", paramName: "ASP.NET-Core" },
  { name: ".NET Core WebAPI (Modern Backend)", paramName: "ASP.NET-Core-WebAPI" },
  { name: "Core Java + Spring Boot", paramName: "Java" },
  { name: "Flutter (Cross-Platform)", paramName: "Flutter" },
  { name: "Android Application Development", paramName: "AndroidStudio" },
  { name: "Python", paramName: "Python" },

];

const CourseSection = () => {
  return (
    <div className="px-8 py-7">
      <h2 className="text-4xl font-bold mb-6 text-center">Our Courses</h2>

      <div className="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
        {courses.map((course) => (
          <div
            key={course.name}
            className="shadow-md p-5 rounded-2xl text-amber-50 bg-white dark:bg-gray-800 transition hover:shadow-lg">
            <h3 className="text-xl font-semibold mb-3">{course.name}</h3>
            <p className="text-gray-500 mb-4">
              Learn everything about {course.name} with detailed notes.
            </p>

            {/* Button → Redirect to NotesLayout */}
   
            <RegisterBtn label="Start Learning" labelLink={`/Learn/${course.paramName}`}/>

          </div>
        ))}
      </div>
    </div>
  );
};

export default CourseSection;
