import express from 'express'
import nodemailer from 'nodemailer'

const app = express()

const trans = nodemailer.createTransport({
    service : 'gmail',
    auth : {
        user : 'alokmauryaofficial7349@gmail.com',
        pass : "bexd alwl qkwt qrsd"
    }
})

app.use(express.urlencoded({extended: false}))
app.use(express.json())
app.set("view engine", "ejs")

app.get("/", (req, resp) => {
    resp.send("Hello")
})
app.get("/mail", (req, resp) => {
    resp.render("mail")
})
app.post("/submit-email", (req, resp) => {
    console.log(req.body)

    const mailOptions = {
        from : 'alokmauryaofficial7349@gmail.com',
        to : 'alokmaurya2056776@gmail.com',
        subject : req.body.subject,
        text : req.body.message
    }
    trans.sendMail(mailOptions, (error, info) => {
        if (error)
        {
            resp.send("Email Failed!")
        }
        else{
            resp.send("Email Sent!")   
        }
    })
    resp.send("Email Submitted")
})

app.listen(1122)