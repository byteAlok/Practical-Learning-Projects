import React from 'react'

const AspDotNetCoreHeader = () => {
  return (
    <>AspDotNetCore</>
  )
}
const AspDotNetCoreList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to AspDotNetCore</a></li>

    </>
  )
}
const AspDotNetCoreBody = () => {
  return (
    <div>Welcome to the AspDotNetCore Programming Language.</div>
  )
}

export { AspDotNetCoreHeader, AspDotNetCoreList, AspDotNetCoreBody }