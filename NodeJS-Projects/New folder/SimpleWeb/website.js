const http = require("http")
const fs = require("fs")
const path = require("path")

http.createServer((req, resp) => {

    // CSS handling
    if (req.url.endsWith(".css")) {
        const cssPath = path.join("../html" + req.url)

        fs.readFile(cssPath, "utf8", (err, data) => {
            if (err) {
                resp.writeHead(404, {"content-type": "text/plain"})
                resp.end("CSS Not Found")
            } else {
                resp.writeHead(200, {"content-type": "text/css"})
                resp.end(data)
            }
        })
        return
    }

    // HTML handling
    let filePath = req.url === "/"
        ? path.join("../html", "home.html")
        : path.join("../html", req.url + ".html")
console.log(filePath)
    fs.readFile(filePath, "utf8", (err, data) => {
        if (err) {
            resp.writeHead(404, {"content-type": "text/plain"})
            resp.end("Page Not Found")
        } else {
            resp.writeHead(200, {"content-type": "text/html"})
            resp.end(data)
        }
    })

}).listen(3700)
