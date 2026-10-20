import exp from "express";
import { MongoClient, ObjectId } from "mongodb";
import session from "express-session";

const app = exp();
const port = 3000;

app.use(session({
    secret: "your-secret-key",
    resave: false,
    saveUninitialized: true,
}));

const url = "mongodb://localhost:27017";
const client = new MongoClient(url);
const dbName = "school";
const collectionName = "students";

async function connectToDatabase() {
    try {
        await client.connect();
        console.log("Connected to MongoDB");

        return client.db(dbName).collection(collectionName);

    } catch (error) {
        console.error("Error connecting to MongoDB:", error);
    }
}

const collection = await connectToDatabase();

app.set("view engine", "ejs");

app.use(exp.json());
app.use(exp.urlencoded({ extended: true }));

app.get("/", (req, res) => {
    res.render("home");
});

app.get("/register", (req, res) => {
    res.render("reg-form");
});
app.post("/register", async (req, res) => {
    try {
        const newStudent = {
            name: req.body.sname,
            age: parseInt(req.body.age),
        };
        await collection.insertOne(newStudent);

        req.session.message = "Student registered successfully!";
        req.session.messageType = true; // true for success

        res.redirect("/student");

    } catch (error) {
        console.error("Error registering student:", error);
        req.session.message = "Failed to register student.";
        req.session.messageType = false; // false for error
        res.status(500).send("Internal Server Error");
    }
});

app.get("/student", async (req, res) => {
    try {
        const students = await collection.find({}).toArray();

        const message = req.session.message || null;
        const messageType = req.session.messageType || null;

        req.session.message = null;
        req.session.messageType = null;

        res.render("student", { students, totalStudents: true, message, messageType,});

    } catch (error) {
        console.error("Error fetching students:", error);
        res.status(500).send("Internal Server Error");
    }
});

app.get("/student/:id", async (req, res) => {
    const studentId = req.params.id;

    try {
        const student = await collection.findOne({ _id: new ObjectId(req.params.id) });

        const message = req.session.message || null;
        const messageType = req.session.messageType || null;
 
        req.session.message = null;
        req.session.messageType = null;

        res.render("student", { student, totalStudents: false , message ,messageType});

    } catch (error) {
        console.error("Error fetching student:", error);

        res.status(500).send("Internal Server Error");
    } 
});
app.get("/update/:id", async (req, res) => {
    try {
        const student = await collection.findOne({ _id: new ObjectId(req.params.id) });
        res.render("update", { student });

    } catch (error) {
        console.error("Error fetching student for update:", error);
        res.status(500).send("Internal Server Error");
    }
});
app.post("/update/:id", async (req, res) => {
    try {
        const updatedStudent = {
            sname: req.body.sname,
            age: parseInt(req.body.age),
        };

        await collection.updateOne({ _id: new ObjectId(req.params.id) }, { $set: updatedStudent });
        req.session.message = "Student updated successfully!";
        req.session.messageType = true;

        res.redirect("/student/" + req.params.id);

    } catch (error) {
        console.error("Error updating student:", error);
        req.session.message = "Failed to update student.";
        req.session.messageType = false;
        res.status(500).send("Internal Server Error");
    }
});
app.post("/delete/:id", async (req, res) => {
    try {
        await collection.deleteOne({ _id: new ObjectId(req.params.id) });

        req.session.message = "Student deleted successfully!";
        req.session.messageType = true;
        
        res.redirect("/student");

    } catch (error) {
        console.error("Error deleting student:", error);
        req.session.message = "Failed to delete student.";
        req.session.messageType = false;

        res.redirect("/student");
    }
});

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});