import express from 'express'
import cors from 'cors'

const app = express()

app.use(cors())

app.get("/", (req, resp) => {
    resp.send("Hello CORS")
})

app.listen(4444)