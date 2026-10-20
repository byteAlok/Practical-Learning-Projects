import React from 'react'

const MySqlHeader = () => {
  return (
    <>MySql</>
  )
}
const MySqlList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to MySql</a></li>

    </>
  )
}
const MySqlBody = () => {
  return (
    <div>Welcome to the MySql Programming Language.</div>
  )
}

export { MySqlHeader, MySqlList, MySqlBody }