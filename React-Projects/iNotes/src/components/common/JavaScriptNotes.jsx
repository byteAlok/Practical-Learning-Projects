import React from 'react'

const JavaScriptHeader = () => {
  return (
    <>JavaScript</>
  )
}
const JavaScriptList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
    {/* Phase 1 : JavaScript Foundations (Beginner Level)  */}
      <li><a href="#" className={`${topicStyle}`}>Introduction to JavaScript</a></li>
      <li><a href="#" className={`${topicStyle}`}>Variables & Data Types</a></li>
      <li><a href="#" className={`${topicStyle}`}>Operators</a></li>
      <li><a href="#" className={`${topicStyle}`}>Control Flow</a></li>
      <li><a href="#" className={`${topicStyle}`}>Functions (Core Concept)</a></li>

    {/* Phase 2 : Intermediate JavaScript (Logic & Data Handling) */}
      <li><a href="#" className={`${topicStyle}`}>Arrays</a></li>
      <li><a href="#" className={`${topicStyle}`}>Strings</a></li>
      <li><a href="#" className={`${topicStyle}`}>Objects</a></li>
      <li><a href="#" className={`${topicStyle}`}>Date & Math</a></li>

    {/* Phase 3 : Advanced JavaScript (Core Engine Concepts) */}
      <li><a href="#" className={`${topicStyle}`}>Scope & Hoisting</a></li>
      <li><a href="#" className={`${topicStyle}`}>Closures</a></li>
      <li><a href="#" className={`${topicStyle}`}>Execution Context & Call Stack</a></li>
      <li><a href="#" className={`${topicStyle}`}>This Keywords</a></li>
      <li><a href="#" className={`${topicStyle}`}>Event Loop & Asynchronous JS</a></li>

    {/* Phase 4 : Asynchronuos JavaScript */}
      <li><a href="#" className={`${topicStyle}`}>Callbacks</a></li>
      <li><a href="#" className={`${topicStyle}`}>Promises</a></li>
      <li><a href="#" className={`${topicStyle}`}>Async/Await</a></li>
      <li><a href="#" className={`${topicStyle}`}>Fetch API & AJAX</a></li>

    {/* Phase 5 : DOM Manipulation & Events */}
      <li><a href="#" className={`${topicStyle}`}>DOM (Document Object Model)</a></li>
      <li><a href="#" className={`${topicStyle}`}>Events</a></li>

    {/* Phase 6 : Browser APIs & Storage */}
      <li><a href="#" className={`${topicStyle}`}>Browser APIs</a></li>
      <li><a href="#" className={`${topicStyle}`}>Storage</a></li>

    {/* Phase 7 : Modern JavaScript (ES6+) */}
      <li><a href="#" className={`${topicStyle}`}>ES6+ Features</a></li>

    {/* Phase 8 : Professional JavaScript (Project-Level) */}
      <li><a href="#" className={`${topicStyle}`}>Error Handling</a></li>
      <li><a href="#" className={`${topicStyle}`}>Regular Expressions (RegEx)</a></li>
      <li><a href="#" className={`${topicStyle}`}>Modules & Tooling</a></li>
      <li><a href="#" className={`${topicStyle}`}>Object-Oriented JavaScript</a></li>
      <li><a href="#" className={`${topicStyle}`}>Functical Programming Concepts</a></li>
      <li><a href="#" className={`${topicStyle}`}>Memory Management</a></li>
      <li><a href="#" className={`${topicStyle}`}>Advanced Topics</a></li>

    {/* Bonus Phase : JavaScript in Real Projects */}
      <li><a href="#" className={`${topicStyle}`}>DOM-based Mini Projects</a></li>
      <li><a href="#" className={`${topicStyle}`}>API-based Projects</a></li>
      <li><a href="#" className={`${topicStyle}`}>Advanced Projects</a></li>
    </>
  )
}
const JavaScriptBody = () => {
  return (
    <div>Topics Body</div>
  )
}

export { JavaScriptHeader, JavaScriptList, JavaScriptBody }