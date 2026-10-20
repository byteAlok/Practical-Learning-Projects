import express from 'express'
import multer from 'multer'
import cors from 'cors';

const app = express()

// app.use(cors());

// app.use(
//   cors({
//     origin: '*'
//   })
// );

// app.use(
//   cors({
//     origin: 'http://localhost:5173'
//   })
// );

app.use(
  cors({
    origin: [
      'http://localhost:5173',
      'http://localhost:3000',
      'https://myapp.com'
    ]
  })
);

const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, 'upload')
    },
    filename: (req, file, cb) => {
        cb(null, Date.now() + '-' + file.originalname)
    }
})
const upload = multer({ storage })

app.get("/", (req, resp) => {
    resp.send("<h1>hello world</h1>")  
})

app.get("/upload", (req, resp) => {
    resp.send(`
        <form method='post' action='/upload' enctype='multipart/form-data'>
        <input type='file' name='myFile'/>
        <button>Upload File</button>
        </form>
        `)
})

app.post("/upload", upload.single('myFile'), (req, resp) => {
    resp.send({
        message: "file uploaded",
        status: true,
        info: req.file
    })
})

app.listen(3434, () => {
    console.log("server started at 3434...")
})