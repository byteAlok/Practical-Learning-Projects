import express from 'express';
import { MongoClient } from 'mongodb';

const dbName = "school"
const url = "mongodb://localhost:27017"

const client = new MongoClient(url)

// async function dbConnection(){
//     await client.connect()
//     const db = client.db(dbName)
//     const collection = db.collection('students')

//     const result = await collection.find()

//     // console.log(result)
// }
// dbConnection()

const app = express()

app.set("view engine", "ejs")

app.get("/", async (req, resp) => {
    await client.connect()
    const db = client.db(dbName)
    const collection = db.collection('students')

    const data = await collection.find().toArray()

    resp.render("students", {dataJson : data})
})

app.listen(3800)