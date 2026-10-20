import React from 'react'

const DotNetCoreWebApiHeader = () => {
  return (
    <>DotNetCoreWebApi</>
  )
}
const DotNetCoreWebApiList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to DotNetCoreWebApi</a></li>

    </>
  )
}
const DotNetCoreWebApiBody = () => {
  return (
    <div>Welcome to the DotNetCoreWebApi Programming Language.</div>
  )
}

export { DotNetCoreWebApiHeader, DotNetCoreWebApiList, DotNetCoreWebApiBody }