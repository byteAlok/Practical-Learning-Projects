import React, { useState, useEffect } from 'react'
import { Link } from 'react-router-dom'
import { SunIcon, MoonIcon } from "@heroicons/react/24/solid";

const RegisterBtn = ({ label = "Register", labelLink = "#", className = "" }) => {
  return (
    <Link to={labelLink} className={`inline-block bg-gradient-to-r from-[#24497b] via-[#0076ba] to-[#1521bb] text-white px-7 py-[7px] rounded-full font-medium transition-all duration-300 hover:-translate-y-[2px] hover:shadow-[0_6px_20px_rgba(13,110,253,0.3)] ${className}`}>{label}</Link>
  )
}

const LoginBtn = ({ label = "Log in", labelLink = "#", className = "" }) => {
  return (
    <Link
      to={labelLink}
      className={`rounded-full font-medium text-transparent bg-clip-text
                 bg-gradient-to-r from-[#24497b] via-[#0076ba] to-[#1521bb]
                 hover:text-white hover:bg-clip-padding
                 hover:bg-gradient-to-r hover:from-[#24497b] hover:via-[#0076ba] hover:to-[#1521bb]
                 transition-all duration-200 ease-in-out px-7 py-[6px] border border-blue-700 hover:border-transparent inline-block ${className}`}>
      {label}
    </Link>
  )
}

const HeadingText = ({ label = "Heading", className = "" }) => {
  return (
    <h1 className={`font-semibold bg-gradient-to-r from-[#24497b] via-[#0076ba] to-[#1521bb] bg-clip-text text-transparent ms-4 sm:-ms-[5px] md:ms-0 ${className}`}>{label}</h1>
  )
}

const SpanText = ({ label = "SpanText", className = "" }) => {
  return (
    <span className={`bg-gradient-to-r from-[#24497b] via-[#0076ba] to-[#1521bb] bg-clip-text text-transparent rounded inline-block ${className}`}>{label}</span>)
}


const ThemeToggleButton = ({ className = "" }) => {
  const [darkMode, setDarkMode] = useState(true);

  // 🌓 Apply or remove dark mode on <html>
  useEffect(() => {
    if (darkMode) {
      document.documentElement.classList.add("dark");
    } else {
      document.documentElement.classList.remove("dark");
    }
  }, [darkMode]);

  return (
    <button
      onClick={() => setDarkMode(!darkMode)}
      className={`
        relative flex shrink-0 items-center justify-center h-[25px] w-[49px] sm:w-13 sm:h-[26px] rounded-full
        transition-all duration-300 ease-in-out shadow-md cursor-pointer ${className}
        ${darkMode
          ? "bg-gradient-to-r from-orange-500 via-yellow-400 to-yellow-600"
          : "bg-gradient-to-r from-cyan-950 via-blue-950 to-sky-950"}
      `}>

      {/* "bg-gradient-to-r from-sky-400 via-cyan-600 to-blue-800"
          : "bg-gradient-to-r from-blue-800 via-cyan-600 to-sky-300" */}

      <div
        className={`
          absolute flex items-center bg-gray-100 justify-center w-5 h-5  rounded-full shadow
          transform transition-transform duration-300
          ${darkMode ? "translate-x-6 left-[2.5px] top-[2px] sm:top-[3px] sm:left-[5px]" : "translate-x-0 left-[2px] top-[2px] sm:top-[3px] sm:left-[3.5px]"}
        `}
      >
        {darkMode ? (
          <MoonIcon className="w-4 h-4 sm:w-[18px] sm:h-[18px] text-sky-950 relative top-[0.5px]" />
        ) : (
          <SunIcon className="w-4 h-4 sm:w-[18px] sm:h-[18px] text-yellow-500 relative top-[0.25px]" />
        )}
      </div>
    </button>
  );
};


export { RegisterBtn, LoginBtn, HeadingText, SpanText, ThemeToggleButton }
