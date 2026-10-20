import express from "express";

const app = express();

app.get("/", (req, resp) => {
    resp.send(
        `<h1>Hello</h1>
        <p>Welcome to the backend.</p>
        `
    )
})

app.listen(34000);