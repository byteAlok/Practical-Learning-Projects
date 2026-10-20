import mongoose from "mongoose";
import express from 'express';
import stuModel from "./model/stuModel.js";

const app = express()
app.use(express.json())

await mongoose.connect("mongodb://localhost:27017/school")
    .then(() => console.log("______connected______"));

app.get("/", async (req, resp) => {

    const stuData = await stuModel.find()
    console.log(stuData)
    resp.send(stuData)
})

app.post("/save", async (req, resp) => {
    console.log(req.body)

    const { name, age, email } = req.body

    if (!req.body || !name || !age || !email) {
        resp.send({
            message: "data not stored",
            status: false,
            storedInfo: null
        })
        return false
    }

    const stuData = await stuModel.create(req.body)
    resp.send({
        message: "data stored",
        status: true,
        storedInfo: stuData
    })
})

app.put("/update/:id", async (req, resp) => {

    const id = req.params.id
    console.log(req.body, id)

    const stuData = await stuModel.findByIdAndUpdate(id, {...req.body})

    resp.send({
        message: "data updated",
        status: true,
    })
})
app.delete("/delete/:id", async (req,resp) => {

    const id = req.params.id
    console.log(req.body, id)
    
    const stuData = await stuModel.findByIdAndDelete(id)
    resp.send({
        message: "data deleted",
        status: true
    })
})

app.listen(3300)