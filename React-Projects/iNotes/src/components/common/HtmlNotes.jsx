import React from 'react'

const HTMLHeader = () => {
  return (
    <>HTML</>
  )
}
const HTMLList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to HTML</a></li>

    </>
  )
}
const HTMLBody = () => {
  return (
    <div>Welcome to the HTML Programming Language.</div>
  )
}

export { HTMLHeader, HTMLList, HTMLBody }