const fs = require("fs")
const path = require("path")
const os = require("os")

const desktopFile = path.join(os.homedir(), "Desktop", "f1.txt")
const content = "This file was created using fs module.\n"

fs.writeFile(desktopFile, content, (err) => {
  if (err) {
    console.error("Failed to create file:", err)
    return
  }
  console.log(`Created file: ${desktopFile}`)
})
