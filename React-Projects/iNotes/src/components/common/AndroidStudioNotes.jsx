import React from 'react'

const AndroidStudioHeader = () => {
  return (
    <>AndroidStudio</>
  )
}
const AndroidStudioList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to AndroidStudio</a></li>

    </>
  )
}
const AndroidStudioBody = () => {
  return (
    <div>Welcome to the AndroidStudio Programming Language.</div>
  )
}

export { AndroidStudioHeader, AndroidStudioList, AndroidStudioBody }