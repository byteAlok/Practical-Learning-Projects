import { MongoClient } from "mongodb";

// ------ Enter your DB connection string -------
const url = "" 
const database = "institute"
const collection = "students"

const client = new MongoClient(url)

client.connect().then(() => {
    console.log("_____connect_____")
})

async function dbCon(){
    const db = client.db(database)
    const collectResult = db.collection(collection)

    const result = await collectResult.find().toArray()

    console.log(result)
}
dbCon()