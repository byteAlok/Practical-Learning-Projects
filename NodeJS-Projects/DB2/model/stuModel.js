import mongoose from "mongoose";
import stuSchema from "../schema/stuSchema.js";

const stuModel = mongoose.model("students", stuSchema)

export default stuModel;