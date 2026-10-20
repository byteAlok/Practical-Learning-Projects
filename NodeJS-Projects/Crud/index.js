import express from "express";
import { MongoClient } from "mongodb";

const url = "mongodb://localhost:27017"
const client = new MongoClient(url)

let database;
let table;

const app = express()

client.connect().then((dbase) => {
    database = dbase.db("school")
    table = database.collection("students")
})

app.use(express.urlencoded({extended : true}))
app.use(express.json)

app.set("view engine", "ejs")

app.get("/", (req, resp) => {
    resp.render("home")
})
app.get("/api", async (req, resp) => {

    const data = await table.find().toArray()

    resp.send(data)
})
app.get("/list", async (req, resp) => {

    const data = await table.find().toArray()

    resp.render("students", { data })
})
app.get("/form", (req, resp) => {
    resp.render("form")
})
app.post("/submit-form", async (req, resp) => {
    console.log(req.body)
    const result = await table.insertOne(req.body)
    console.log(result)
    resp.send("<h2>Form Submitted</h2><a href='/'> Go to home</a>")
})


//  ------------- API ---------------------

app.post("/add-student-api", (req, resp) => {
    console.log(req.body)
    resp.send({message : "Success"})
})


app.listen(3200, () => {
    console.log("Server is running on port 3200...")
})