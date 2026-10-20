import session from "express-session"; 
import express from "express"; 

const app = express(); 

app.use(express.urlencoded({ extended: true })); 

app.use(session({ 
    secret: "apple",
    resave: false,
    saveUninitialized: false 
})); 

app.set("view engine", "ejs"); 

app.get("/login", (req, res) => {
    res.render("login"); 
}); 

app.post("/profile", (req, res) => {
    console.log(req.session.data)
    req.session.data = req.body.username;
    console.log(req.session.data)
    res.render("profile"); 
}); 

app.get("/", (req, res) => { 
    let data = req.session.data || "Guest";
    console.log(data)
    res.render("home", { data }); 
}); 

app.listen(2233); 
