import React, { useState } from 'react';
import { useParams, Link } from 'react-router-dom';
import { ThemeToggleButton } from '../common/Templates';

import { JavaScriptHeader, JavaScriptBody, JavaScriptList } from '../common/JavaScriptNotes'
import { PHPHeader, PHPBody, PHPList } from '../common/PhpNotes';
import { AndroidStudioHeader, AndroidStudioBody, AndroidStudioList } from '../common/AndroidStudioNotes';
import { AspDotNetCoreHeader, AspDotNetCoreBody, AspDotNetCoreList } from '../common/AspDotNetCoreNotes';
import { AspDotNetHeader, AspDotNetBody, AspDotNetList } from '../common/AspDotNetNotes';
import { CSharpHeader, CSharpBody, CSharpList } from '../common/CSharpCoreNotes';
import { CSSHeader, CSSBody, CSSList } from '../common/CssNotes';
import { DotNetCoreWebApiHeader, DotNetCoreWebApiBody, DotNetCoreWebApiList } from '../common/DotNetCoreWebApiNotes';
import { ExpressJsHeader, ExpressJsBody, ExpressJsList } from '../common/ExpressNotes';
import { FlutterHeader, FlutterBody, FlutterList } from '../common/FlutterNotes';
import { GitHubHeader, GitHubBody, GitHubList } from '../common/GitHubNotes';
import { MongoDbHeader, MongoDbBody, MongoDbList } from '../common/MongoDbNotes';
import { HTMLHeader, HTMLBody, HTMLList } from '../common/HtmlNotes';
import { MySqlHeader, MySqlBody, MySqlList } from '../common/MySqlNotes';
import { NextJsHeader, NextJsBody, NextJsList } from '../common/NextJsNotes';
import { NodeJsHeader, NodeJsBody, NodeJsList } from '../common/NodeJsNotes';
import { ReactHeader, ReactBody, ReactList } from '../common/ReactNotes';
import { JavaCoreHeader, JavaCoreBody, JavaCoreList } from '../common/JavaCoreNotes';
import { PythonHeader, PythonBody, PythonList } from '../common/PythonNotes';

const NotesLayout = () => {

    const { CourseName } = useParams()

    let SubjectHeader = null
    let TopicList = null
    let TopicBody = null

    switch (CourseName) {
        case "JavaScript": {
            SubjectHeader = <JavaScriptHeader />
            TopicList = <JavaScriptList />
            TopicBody = <JavaScriptBody />
            break
        }
        case "PHP": {
            SubjectHeader = <PHPHeader />
            TopicList = <PHPList />
            TopicBody = <PHPBody />
            break
        }
        case "React-Js": {
            SubjectHeader = <ReactHeader />
            TopicList = <ReactList />
            TopicBody = <ReactBody />
            break
        }
        case "Python": {
            SubjectHeader = <PythonHeader />
            TopicList = <PythonList />
            TopicBody = <PythonBody />
            break
        }
        case "Node-Js": {
            SubjectHeader = <NodeJsHeader />
            TopicList = <NodeJsList />
            TopicBody = <NodeJsBody />
            break
        }
        case "Next-Js": {
            SubjectHeader = <NextJsHeader />
            TopicList = <NextJsList />
            TopicBody = <NextJsBody />
            break
        }
        case "MySQL": {
            SubjectHeader = <MySqlHeader />
            TopicList = <MySqlList />
            TopicBody = <MySqlBody />
            break
        }
        case "MongoDb": {
            SubjectHeader = <MongoDbHeader />
            TopicList = <MongoDbList />
            TopicBody = <MongoDbBody />
            break
        }
        case "Java": {
            SubjectHeader = <JavaCoreHeader />
            TopicList = <JavaCoreList />
            TopicBody = <JavaCoreBody />
            break
        }
        case "HTML": {
            SubjectHeader = <HTMLHeader />
            TopicList = <HTMLList />
            TopicBody = <HTMLBody />
            break
        }
        case "Git-GitHub": {
            SubjectHeader = <GitHubHeader />
            TopicList = <GitHubList />
            TopicBody = <GitHubBody />
            break
        }
        case "Flutter": {
            SubjectHeader = <FlutterHeader />
            TopicList = <FlutterList />
            TopicBody = <FlutterBody />
            break
        }
        case "Express-Js": {
            SubjectHeader = <ExpressJsHeader />
            TopicList = <ExpressJsList />
            TopicBody = <ExpressJsBody />
            break
        }
        case "ASP.NET-Core-WebAPI": {
            SubjectHeader = <DotNetCoreWebApiHeader />
            TopicList = <DotNetCoreWebApiList />
            TopicBody = <DotNetCoreWebApiBody />
            break
        }
        case "CSS": {
            SubjectHeader = <CSSHeader />
            TopicList = <CSSList />
            TopicBody = <CSSBody />
            break
        }
        case "C#": {
            SubjectHeader = <CSharpHeader />
            TopicList = <CSharpList />
            TopicBody = <CSharpBody />
            break
        }
        case "ASP.NET": {
            SubjectHeader = <AspDotNetHeader />
            TopicList = <AspDotNetList />
            TopicBody = <AspDotNetBody />
            break
        }
        case "ASP.NET-Core": {
            SubjectHeader = <AspDotNetCoreHeader />
            TopicList = <AspDotNetCoreList />
            TopicBody = <AspDotNetCoreBody />
            break
        }
        case "AndroidStudio": {
            SubjectHeader = <AndroidStudioHeader />
            TopicList = <AndroidStudioList />
            TopicBody = <AndroidStudioBody />
            break
        }
        default: {
            SubjectHeader = <span className='text-red-500'>Select Course</span>
            TopicList = <span className='text-red-500 px-4'>Topics Null</span>
            TopicBody = <h2 className='text-red-500'>Please select a valid course</h2>
        }
    }

    const [open, setOpen] = useState(true);
    const [openMobile, setOpenMobile] = useState(false);

    // 🎨 Global Theme Colors (change here only)
    const bgColorStart = '#d2efff';
    const bgColorEnd = '#e0f6ff';
    const textColor = 'text-gray-950';

    const toggleBtn = () => setOpen(!open);
    const toggleBtnMobile = () => setOpenMobile(!openMobile);

    // 💎 Common glass gradient background class
    const glassBg = `bg-gradient-to-r from-[${bgColorStart}]/70 to-[${bgColorEnd}]/70 backdrop-blur-xl`;

    return (
        <div className={`w-full flex ${textColor} h-screen overflow-hidden dark:bg-gray-950 dark:text-gray-200`}>

            {/* 🧭 Left Sidebar — Desktop */}
            <div
                className={`sticky top-0 z-40 shrink-0 transform transition-transform duration-300 ease-in-out 
                ${open ? 'translate-x-0 w-74 2xl:w-80 hidden lg:flex flex-col' : '-translate-x-full hidden'}
                ${glassBg} dark:bg-gray-950`}>

                {/* Drawer Header */}
                <div className={`sticky top-0 z-45 flex items-center justify-between border-b border-gray-400 ${glassBg}`}>
                    <h2 className='text-xl py-[14px] ps-4 font-medium truncate cursor-pointer dark:text-gray-100'>{SubjectHeader}</h2>
                    <button onClick={toggleBtn} className='flex shrink-0 text-2xl font-extrabold py-[10px] px-4 hover:text-red-500'>✕</button>
                </div>

                {/* Drawer Items */}
                <div className='flex-1 overflow-y-auto custom-scrollbar border-r border-gray-400'>
                    <ul className="space-y-1 font-medium pb-4 pt-3">{TopicList}</ul>
                </div>
            </div>

            {/* 📱 Left Sidebar — Mobile */}
            <div
                className={`fixed top-0 left-0 z-50 h-screen overflow-y-none transform transition-transform duration-300 ease-in-out border-r border-gray-400
                ${openMobile ? 'translate-x-0 block lg:hidden w-74 2xl:w-80' : '-translate-x-full lg:hidden'}
                ${glassBg}`}>

                {/* Drawer Header */}
                <div className={`flex items-center justify-between border-b border-gray-400 ${glassBg}`}>
                    <h2 className='text-xl py-[14px] ps-4 font-medium truncate cursor-pointer dark:text-gray-100'>{SubjectHeader}</h2>
                    <button onClick={toggleBtnMobile} className='flex shrink-0 text-2xl font-extrabold py-[10px] px-4 hover:text-red-500'>✕</button>
                </div>

                {/* Drawer Items */}
                <ul className="space-y-1 font-medium mt-3 mb-4 custom-scrollbar overflow-y-auto h-[calc(100%-60px)]"> {TopicList} </ul>
            </div>

            {/* 🧩 Main Content (Right) */}
            <div className={`${open ? 'w-full lg:w-[calc(100%-296px)] 2xl:w-[calc(100%-320px)]' : 'w-full'} relative z-35 flex flex-col h-screen overflow-hidden`}>

                {/* Navbar Header */}
                <div className={`w-full sticky top-0 flex items-center justify-between border-b border-gray-400 px-4 py-1 ${glassBg} dark:text-gray-100`}>
                    <button onClick={toggleBtn} className="hidden lg:block text-xl sm:text-2xl font-semibold py-2 sm:px-4 sm:mx-8 ps-2">☰</button>
                    <button onClick={toggleBtnMobile} className="block lg:hidden text-xl sm:text-2xl font-semibold py-[10px] px-4 sm:py-2 sm:px-4 -ms-2 sm:ms-4 sm:me-8 me-1">☰</button>


                    <div className='flex items-center'>
                        <nav>
                            <ul className="flex items-center space-x-1 sm:space-x-3 font-[500] sm:me-4">
                                <li><Link to="/" className='py-2 px-3 rounded hover:shadow'>Home</Link></li>
                                <li><Link to="/Courses" className='py-2 px-3 rounded hover:shadow'>Courses</Link></li>
                                <li><Link to="/About" className='hidden sm:block py-2 px-3 rounded hover:shadow'>About</Link></li>
                                <li><Link to="/Contact" className='hidden md:block py-2 px-3 rounded hover:shadow'>Contact</Link></li>
                                <li><Link to="https://alokmaurya.netlify.app/" target="_blank" className='hidden xl:block py-2 px-3 rounded hover:shadow'>Portfolio</Link></li>
                            </ul>

                        </nav>
                        {/* <ThemeToggleButton className='me-4 my-2' /> */}

                        {/* <h2 className="hidden sm:block text-[clamp(14px,15px,16px)] sm:text-base xk:text-lg font-medium text-blue-800 dark:text-sky-400 px-2 sm:px-3 truncate cursor-pointer hover:shadow hover:rounded py-1">Alok Maurya</h2>
                        <img src='/src/assets/images/college girl.jpg' className='sm:w-11 w-10 sm:h-11 h-10 border-2 border-blue-800 dark:border-sky-400 rounded-full ms-2 me-1 sm:me-8 cursor-pointer' /> */}
                    </div>
                </div>

                {/* 🧠 Body */}
                <div className={`flex-1 overflow-y-auto custom-scrollbar w-[96%] mx-auto px-5 py-4 sm:px-6 sm:py-5 md:px-7 md:py-6 lg:p-6 xl:py-8 xl:px-10 ${glassBg}`}>{TopicBody}</div>
            </div>
        </div>
    );
};

export default NotesLayout;
