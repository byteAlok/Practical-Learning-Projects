import express from 'express'
// import { handleUser } from './controller/userController.js'
import userJson from './usrr.json' with {type : 'json'}

const app = express()

// app.set("view engine", "ejs")

// app.get("/users", handleUser)

// ------------------------ Dynamic Routes ----------------
/*
app.get("/users", (req, resp) => {
    const userName = ['alok', "ravi", "shivam", "yuvraj"]
    let data = "<ul>"

    for (let i of userName)
    {
        // console.log(i)
        data =  data + `<li><a href='users/${i}'>${i}</a></li>`
    }
    data =  data + "</ul>"
    resp.send(data)
})

app.get("/users/:id", (req, resp) => {
    resp.send(`Your name is : ${req.params.id}`)
})
*/

// ---------------- Fetching JSON file data ------------------
app.get("/", (req, resp) => {
    console.log(userJson)

    resp.send(userJson)
})
app.get("/user/:id", (req, resp) => {
    const id = req.params.id
    let uData = userJson.filter( a => a.name == id )
    resp.send(uData)
})


app.listen(3400)