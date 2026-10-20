import React from 'react'

const NextJsHeader = () => {
  return (
    <>NextJs</>
  )
}
const NextJsList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to NextJs</a></li>

    </>
  )
}
const NextJsBody = () => {
  return (
    <div>Welcome to the NextJs Programming Language.</div>
  )
}

export { NextJsHeader, NextJsList, NextJsBody }