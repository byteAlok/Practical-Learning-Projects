import React from 'react'

const MongoDbHeader = () => {
  return (
    <>MongoDb</>
  )
}
const MongoDbList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to MongoDb</a></li>

    </>
  )
}
const MongoDbBody = () => {
  return (
    <div>Welcome to the MongoDb Programming Language.</div>
  )
}

export { MongoDbHeader, MongoDbList, MongoDbBody }