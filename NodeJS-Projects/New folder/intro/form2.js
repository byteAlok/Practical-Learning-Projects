const http = require("http")

const userData = require("./data")
const userSubmit = require("./data copy")

http.createServer( (req, resp) => {
    
    resp.writeHead(200, {"Content-Type" : "text/html"})

    if (req.url == "/")
    {
        userData(req, resp)    
    }
    else if (req.url == "/submit")
    {
        userSubmit(req, resp)   
    }




    resp.end()
}).listen(3500)