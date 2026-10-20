import { StrictMode } from "react";
import { createRoot } from "react-dom/client";
import { createBrowserRouter, RouterProvider } from "react-router-dom";
import "./index.css";
import App from "./App.jsx";

// ----------------------------- Pages -------------------------------- 

import Home from "./components/pages/Home.jsx";
import NotesLayout from "./components/layout/NotesLayout.jsx";
import CourseSection from "./components/sections/CourseSection.jsx";
import AboutSection from "./components/sections/AboutSection.jsx";
import ContactSection from "./components/sections/ContactSection.jsx";

// ----------------------------- Routing -------------------------------

const RouterPages = createBrowserRouter([
  {
    element: <App />,
    children: [
      { path: "/", element: <Home /> },
      { path: "/Courses", element: <CourseSection /> },
      { path: "/About", element: <AboutSection /> },
      { path: "/Course", element: <CourseSection /> },
      { path: "/Contact", element: <ContactSection /> },
    ]
  },
  { path: "Learn33/:CourseName", element: <NotesLayout /> }

]);

createRoot(document.getElementById("root")).render(
  <StrictMode>
    <RouterProvider router={RouterPages} />
  </StrictMode>
);
