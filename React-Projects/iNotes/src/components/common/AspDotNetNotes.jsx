import React from 'react'

const AspDotNetHeader = () => {
  return (
    <>AspDotNet</>
  )
}
const AspDotNetList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to AspDotNet</a></li>

    </>
  )
}
const AspDotNetBody = () => {
  return (
    <div>Welcome to the AspDotNet Programming Language.</div>
  )
}

export { AspDotNetHeader, AspDotNetList, AspDotNetBody }