import React from 'react'

const NodeJsHeader = () => {
  return (
    <>NodeJs</>
  )
}
const NodeJsList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to NodeJs</a></li>

    </>
  )
}
const NodeJsBody = () => {
  return (
    <div>Welcome to the NodeJs Programming Language.</div>
  )
}

export { NodeJsHeader, NodeJsList, NodeJsBody }