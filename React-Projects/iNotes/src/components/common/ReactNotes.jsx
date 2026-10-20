import React from 'react'

const ReactHeader = () => {
  return (
    <>React</>
  )
}
const ReactList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to React</a></li>

    </>
  )
}
const ReactBody = () => {
  return (
    <div>Welcome to the React Programming Language.</div>
  )
}

export { ReactHeader, ReactList, ReactBody }