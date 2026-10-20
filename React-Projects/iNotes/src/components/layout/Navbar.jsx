import React, { useState, useRef, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { RegisterBtn, LoginBtn, HeadingText } from '../common/Templates';

const Navbar = () => {
    const [isMobile, setIsMobile] = useState(false);
    const hamburgerRef = useRef(null);
    const navRef = useRef(null);

    // Close menu when clicking outside (optional enhancement)
    
    useEffect(() => {
        const handleClickOutside = (event) => {
            if (hamburgerRef.current && !hamburgerRef.current.contains(event.target) && navRef.current &&
                !navRef.current.contains(event.target)) {
                setIsMobile(false);
            }
        };
        document.addEventListener('mousedown', handleClickOutside);
        return () => document.removeEventListener('mousedown', handleClickOutside);
    }, []);

    return (
        <header className="bg-gradient-to-r from-[#d2efff] to-[#e5f7ff] sticky top-0 z-50 shadow-sm">
            <div className="max-w-7xl mx-auto flex justify-between items-center px-5 md:px-10 py-[14px]">
                {/* Logo */}
                <HeadingText label='iNotes' className='text-3xl lg:text-4xl font-bold'/>
                <div className='flex items-center'>
                {/* ---------------------- Desktop Menu ---------------------- */}
                <nav className="hidden sm:block">
                    <ul className="flex sm:space-x-4 lg:space-x-6 text-sm md:text-base font-[500] text-gray-800 me-3 md:me-4 lg:me-6">
                        <li><Link to="/">Home</Link></li>
                        <li><Link to="/Courses">Courses</Link></li>
                        <li><Link to="/About">About</Link></li>
                        <li><Link to="/Contact">Contact</Link></li>
                        <li><Link to="https://alokmaurya.netlify.app/" target="_blank">Portfolio</Link></li>
                    </ul>
                </nav>

                {/* Desktop Buttons */}

                <div className="hidden sm:flex items-center space-x-2 lg:space-x-3 sm:-me-[5px] md:me-0">
                    <LoginBtn label="Log in" className='sm:px-4 md:px-5 lg:px-8 text-sm md:text-base' />
                    <RegisterBtn className='sm:px-6 md:px-5 lg:px-8 text-sm md:text-base' />
                </div>
            </div>
                {/* ---------------------- Hamburger Button (Mobile) ---------------------- */}

                <button onClick={() => setIsMobile(!isMobile)} ref={hamburgerRef} className="sm:hidden text-3xl font-semibold bg-gradient-to-r from-[#24497b] via-[#0076ba] to-[#1521bb] bg-clip-text text-transparent focus:outline-none me-4" aria-label="Toggle Mobile Menu" aria-expanded={isMobile}> {isMobile ? '✕' : '☰'} </button>
            </div>

            {/* ---------------------- Mobile Menu ---------------------- */}

            <nav ref={navRef} className={`sm:hidden transition-[max-height,opacity] duration-300 ease-in-out overflow-hidden ${isMobile ? 'max-h-[640px] opacity-100' : 'max-h-0 opacity-0'}`}>

                <div className='border-t border-gray-400'></div>

                <ul className="flex flex-col items-center space-y-4 py-4 text-base font-medium text-gray-800">
                    <li><Link onClick={() => setIsMobile(false)} to="/">Home</Link></li>
                    <li><Link onClick={() => setIsMobile(false)} to="/Learn">Learn</Link></li>
                    <li><Link onClick={() => setIsMobile(false)} to="/About">About</Link></li>
                    <li><Link onClick={() => setIsMobile(false)} to="/Contact">Contact</Link></li>
                    <li><Link onClick={() => setIsMobile(false)} to="https://alokmaurya.netlify.app/" target="_blank">Portfolio</Link></li>
                    <div className="flex flex-col items-center gap-2 pb-1">
                        <LoginBtn className="my-1" />
                        <RegisterBtn />
                    </div>
                </ul>
            </nav>
        </header>
    );
};

export default Navbar;
