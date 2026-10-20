import React from 'react'

const ExpressJsHeader = () => {
  return (
    <>ExpressJs</>
  )
}
const ExpressJsList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to ExpressJs</a></li>

    </>
  )
}
const ExpressJsBody = () => {
  return (
    <div>Welcome to the ExpressJs Programming Language.</div>
  )
}

export { ExpressJsHeader, ExpressJsList, ExpressJsBody }