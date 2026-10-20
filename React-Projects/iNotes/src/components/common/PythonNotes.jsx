import React from 'react'

const PythonHeader = () => {
  return (
    <>Python</>
  )
}
const PythonList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to Python</a></li>

    </>
  )
}
const PythonBody = () => {
  return (
    <div>Welcome to the Python Programming Language.</div>
  )
}

export { PythonHeader, PythonList, PythonBody }