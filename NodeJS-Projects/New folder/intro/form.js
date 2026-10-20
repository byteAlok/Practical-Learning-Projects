// const http = require('http')

// http.createServer((req, resp) => {
//     resp.writeHead(200, {"Content-Type":"text/html"})
//     console.log(req.url)

//     if(req.url == "/")
//     {
//         resp.write(`
//             <form action="/submit" method="post">
//                 <input type="text" placeholder="Enter Full Name" name="fullname"/>
//                 <input type="text" placeholder="Enter Email" name="email"/>
//                 <button>Submit</button>
//             </form>
//         `)
//     }
//     else if (req.url == "/submit")
//     {
//         resp.write(`
//             <h2>Data Submitted</h2>
//         `)
//     }

//     resp.end()
// }).listen(5500)



// const http = require('http')
// const fs = require('fs')

// http.createServer((req, resp) => {

//     fs.readFile('html/form.html', 'utf-8', (err, data) => {

//         if (err) {
//             resp.writeHead(500, {"Content-Type":"text/plain"})
//             resp.end("Internal Error")
//             return
//         }

//         resp.writeHead(200, {"Content-Type" : "text/html"})
//         if (req.url == "/") {
//             resp.write(data)
//         }
//         else if (req.url == "/submit") {
//             resp.write(` <h2>Data Submitted</h2> `)
//         }
//         resp.end()
//     })

// }).listen(5500)



// const http = require('http')
// const fs = require('fs')
// const queryString = require('querystring')

// http.createServer((req, resp) => {

//     fs.readFile('html/form.html', 'utf-8', (err, data) => {

//         if (err) {
//             resp.writeHead(500, { "Content-Type": "text/plain" })
//             resp.end("Internal Error")
//             return
//         }

//         resp.writeHead(200, { "Content-Type": "text/html" })
//         if (req.url == "/") {
//             resp.write(data)
//         }
//         else if (req.url == "/submit") {

//             let dataBody = []
//             req.on('data', (chunk) => { dataBody.push(chunk) })

//             req.on('end', () => {
//                 let rawData = Buffer.concat(dataBody).toString()
//                 let readableData = queryString.parse(rawData)
//                 console.log(readableData)

//             })

//             resp.write(` <h2>Data Submitted</h2> `)
//         }
//         resp.end()
//     })

// }).listen(5500)




const http = require('http')
const fs = require('fs')
const queryString = require('querystring')

http.createServer((req, resp) => {

    fs.readFile('html/form.html', 'utf-8', (err, data) => {

        if (err) {
            resp.writeHead(500, { "Content-Type": "text/plain" })
            resp.end("Internal Error")
            return
        }

        resp.writeHead(200, { "Content-Type": "text/html" })
        if (req.url == "/") {
            resp.write(data)
        }
        else if (req.url == "/submit") {

            let dataBody = []
            let aa
            req.on('data', (chunk) => { dataBody.push(chunk) })

            req.on('end', () => {
                let rawData = Buffer.concat(dataBody).toString()
                let readableData = queryString.parse(rawData)
                console.log(readableData)

                aa = `<h2>Your Name is ${readableData.fullname} and your email id : ${readableData.email}</h2> `
            })

 
            resp.write(` <h2>Data Submitted</h2> `)
        }
        resp.end()
    })

}).listen(5500)

