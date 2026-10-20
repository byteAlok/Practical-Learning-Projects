import React from 'react'

const PHPHeader = () => {
  return (
    <>PHP</>
  )
}
const PHPList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to PHP</a></li>

    </>
  )
}
const PHPBody = () => {
  return (
    <div>Welcome to the PHP Programming Language.</div>
  )
}

export { PHPHeader, PHPList, PHPBody }