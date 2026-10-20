import React from 'react'

const FlutterHeader = () => {
  return (
    <>Flutter</>
  )
}
const FlutterList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to Flutter</a></li>

    </>
  )
}
const FlutterBody = () => {
  return (
    <div>Welcome to the Flutter Programming Language.</div>
  )
}

export { FlutterHeader, FlutterList, FlutterBody }