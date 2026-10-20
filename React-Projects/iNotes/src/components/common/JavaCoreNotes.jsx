import React from 'react'

const JavaCoreHeader = () => {
  return (
    <>JavaCore</>
  )
}
const JavaCoreList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to JavaCore</a></li>

    </>
  )
}
const JavaCoreBody = () => {
  return (
    <div>Welcome to the JavaCore Programming Language.</div>
  )
}

export { JavaCoreHeader, JavaCoreList, JavaCoreBody }