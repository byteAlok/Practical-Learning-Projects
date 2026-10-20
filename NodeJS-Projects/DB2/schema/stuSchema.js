import mongoose from "mongoose";

const stuSchema = mongoose.Schema({
    id: Number,
    name: String,
    email : String,
    age : Number
})

export default stuSchema;