import React from 'react'

const GitHubHeader = () => {
  return (
    <>GitHub</>
  )
}
const GitHubList = () => {

  const topicStyle = "block px-3 py-3 mx-2 hover:text-gray-100 dark:hover:text-gray-950 dark:hover:bg-sky-100 transition-all rounded"

  return (
    <>
      <li><a href="#" className={`${topicStyle}`}>Introduction to GitHub</a></li>

    </>
  )
}
const GitHubBody = () => {
  return (
    <div>Welcome to the GitHub Programming Language.</div>
  )
}

export { GitHubHeader, GitHubList, GitHubBody }