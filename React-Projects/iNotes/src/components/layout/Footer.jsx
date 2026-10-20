import React, { useEffect, useState } from "react";

const Footer = () => {
  const [dateTime, setDateTime] = useState("");
  const [year, setYear] = useState(new Date().getFullYear());

  useEffect(() => {
    const updateDateTime = () => {
      const now = new Date();
      const options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
      };
      setDateTime(now.toLocaleString("en-IN", options));
    };

    updateDateTime();
    const interval = setInterval(updateDateTime, 1000);
    return () => clearInterval(interval);

  }, []);
 
  return (
    <footer className="text-white py-10 relative z-50 px-4 sm:px-5 md:px-6 mt-11 lg:px-10 bg-[radial-gradient(ellipse_at_center,_#0c3353,_#052238,_#060633)]">
      <div className="max-w-7xl mx-auto">

        {/* Top Tagline */}
        <p className="text-center text-sm lg:text-base -mt-[90px] sm:-mt-[78px] mb-8 py-6 px-5 rounded-t-lg bg-gradient-to-t from-[#0d2e58] to-[#5c98d1] text-gray-100">Online learning is flexible and global, while offline learning is personal and disciplined.</p>
        
        {/* Footer Grid */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        
          {/* About */}
          <div>
            <h5 className="text-lg font-semibold mb-3 text-[rgb(174,229,255)] text-center sm:text-left">EduLearn</h5>
            <p className="text-gray-200 text-sm leading-relaxed text-center sm:text-left">Learnify empowers learners to master modern web development. Build your skills with guided tutorials and projects.</p>
          </div>

          {/* Quick Links */}
          <div>
            <h6 className="text-lg font-semibold mb-3 text-[rgb(174,229,255)] text-center sm:text-left">Quick Links</h6>
            <ul className="space-y-2 text-gray-100 text-sm text-center sm:text-left">
              <li><a href="#" className="hover:text-white transition">Home</a></li>
              <li><a href="#" className="hover:text-white transition">Courses</a></li>
              <li><a href="#" className="hover:text-white transition">About</a></li>
              <li><a href="#" className="hover:text-white transition">Contact</a></li>
            </ul>
          </div>

          {/* Resources */}
          <div>
            <h6 className="text-lg font-semibold mb-3 text-[rgb(174,229,255)] text-center sm:text-left">Resources</h6>
            <ul className="space-y-2 text-gray-100 text-sm text-center sm:text-left">
              <li><a href="#" className="hover:text-white transition">Blog</a></li>
              <li><a href="#" className="hover:text-white transition">FAQ</a></li>
              <li><a href="#" className="hover:text-white transition">Support</a></li>
              <li><a href="#" className="hover:text-white transition">Terms & Policy</a></li>
            </ul>
          </div>

          {/* Contact */}
          <div>
            <h6 className="text-lg font-semibold mb-3 text-[rgb(174,229,255)] text-center sm:text-left">Contact</h6>
            <p className="text-sm mb-2 text-center sm:text-left"><i className="bi bi-geo-alt-fill me-2"></i>Azamgarh, India</p>
            <p className="text-sm mb-2 text-center sm:text-left"><i className="bi bi-envelope-fill me-2"></i>info@inotes.com</p>
            <p className="text-sm text-center sm:text-left"><i className="bi bi-telephone-fill me-2"></i>+91 97087 98088</p>
          </div>
        </div>

        {/* Divider */}
        <div className="border-t border-gray-400 mt-8 pt-5 text-center">
          <p className="text-sm mb-1 text-[rgb(174,229,255)]">{dateTime}</p>
          <p className="text-sm text-gray-200">
            © {year} Learnify. All Rights Reserved.
          </p>
        </div>
      </div>
    </footer>
  )
}

export default Footer