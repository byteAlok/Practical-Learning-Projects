const constants = require('constants');
const http = require('http');

// const obj = [
//     {
//         name : "Alok",
//         age : 22,
//     },
//     {
//         name : "Ravi",
//         age : 22,
//     },
//     {
//         name : "Shreya",
//         age : 22,
//     },
//     {
//         name : "Yuvraj",
//         age : 21,
//     }
// ]

// console.log(http.createServer((req, resp)=>{
//     resp.setHeader("Content-Type", "application/json")
//     resp.write(JSON.stringify(obj))
//     resp.end()
// }).listen(4500));

// console.log(http.createServer((req, resp)=>{
//     resp.setHeader("Content-Type", "text/html")
//     resp.write('<h2>Hello Dosto</h2>')
//     resp.end()
// }).listen(4500));


// console.log(http.createServer((req, resp)=>{
//     console.log(req)
//     resp.setHeader("Content-Type", "text/html")
//     resp.write('<h2>Hello Dosto</h2>')
//     resp.end()
// }).listen(4500));

console.log(http.createServer((req, resp)=>{
    if (req.url == "/" || req.url == "/home")
    {
        resp.setHeader("Content-Type", "text/html")
        resp.write('<h2>Welcome to the homepage</h2>')
    }
    else if (req.url == "/login")
    {
        resp.setHeader("Content-Type", "text/html")
        resp.write('<h2>Login Page</h2>')
    }
    else if (req.url == "/product")
    {
        resp.setHeader("Content-Type", "text/html")
        resp.write('<h2>Product Page</h2>')
    }
    else
    {
        resp.setHeader("Content-Type", "text/html")
        resp.write('<h2>Other Page</h2>')
    }
    resp.end()
}).listen(4500));