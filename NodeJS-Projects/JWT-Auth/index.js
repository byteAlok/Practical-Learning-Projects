import express from 'express';
import jwt from 'jsonwebtoken';
import cookieParser from 'cookie-parser';

const app = express();

app.set('view engine', 'ejs');

app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cookieParser());

const JWT_SECRET = "my-super-secret-key-alok";


// ========================
// Authentication Middleware
// ========================

function isAuthenticated(req, res, next) {

  const token = req.cookies.token;

  if (!token) {
    return res.redirect('/login');
  }

  try {

    const decoded = jwt.verify(
      token,
      JWT_SECRET
    );

    req.user = decoded;

    next();

  } catch {

    res.clearCookie('token');

    return res.redirect('/login');
  }
}


// ========================
// Role Middleware
// ========================

function isAdmin(req, res, next) {

  if (req.user.role === 'admin') {
    return next();
  }

  res.status(403).send('Access Denied');
}

function isUser(req, res, next) {

  if (req.user.role === 'user') {
    return next();
  }

  res.status(403).send('Access Denied');
}


// ========================
// Public Routes
// ========================

app.get('/', (req, res) => {
  res.render('home');
});

app.get('/about', (req, res) => {
  res.render('about');
});

app.get('/login', (req, res) => {
  res.render('login');
});


// ========================
// Login
// ========================

app.post('/login', (req, res) => {

  const { username, password, role } = req.body;

  // Admin

  if (
    username === 'aman' &&
    password === 'admin123' &&
    role === 'admin'
  ) {

    const token = jwt.sign(
      {
        username,
        role
      },
      JWT_SECRET,
      {
        expiresIn: '1h'
      }
    );

    res.cookie(
      'token',
      token,
      {
        httpOnly: true,
        sameSite: 'strict',
        secure: false // true in HTTPS
      }
    );

    return res.redirect('/admin-dashboard');
  }

  // User

  if (
    username === 'ravi' &&
    password === 'user123' &&
    role === 'user'
  ) {

    const token = jwt.sign(
      {
        username,
        role
      },
      JWT_SECRET,
      {
        expiresIn: '1h'
      }
    );

    res.cookie(
      'token',
      token,
      {
        httpOnly: true,
        sameSite: 'strict',
        secure: false
      }
    );

    return res.redirect('/user-dashboard');
  }

  res.status(401).send('Invalid Credentials');
});


// ========================
// Admin Routes
// ========================

app.get('/admin',
  isAuthenticated,
  isAdmin,
  (req, res) => {

    res.render('admin');
  }
);

app.get(
  '/admin-dashboard',
  isAuthenticated,
  isAdmin,
  (req, res) => {

    res.render('admin-dashboard');
  }
);


// ========================
// User Routes
// ========================

app.get(
  '/user',
  isAuthenticated,
  isUser,
  (req, res) => {

    res.render('user');
  }
);

app.get(
  '/user-dashboard',
  isAuthenticated,
  isUser,
  (req, res) => {

    res.render('user-dashboard');
  }
);


// ========================
// Logout
// ========================

app.post('/logout', (req, res) => {

  res.clearCookie('token');

  res.redirect('/login');
});


// ========================
// Start Server
// ========================

app.listen(3000, () => {

  console.log(
    'Server running on port 3000'
  );
});

// -----------------------------------------------------------------------


// import express from 'express';
// import jwt from 'jsonwebtoken';
// import cookieParser from 'cookie-parser';

// import {
//   MongoClient,
//   ObjectId
// } from 'mongodb';

// const app = express();

// app.set('view engine', 'ejs');

// app.use(express.json());
// app.use(express.urlencoded({ extended: true }));
// app.use(cookieParser());

// const JWT_SECRET = 'my-super-secret-key-alok';


// // =========================
// // MongoDB Connection
// // =========================

// const client = new MongoClient(
//   'mongodb://127.0.0.1:27017'
// );

// await client.connect();

// console.log('MongoDB Connected');

// const db = client.db('authDB');

// const usersCollection =
//   db.collection('users');


// // =========================
// // Authentication Middleware
// // =========================

// async function isAuthenticated(
//   req,
//   res,
//   next
// ) {

//   const token = req.cookies.token;

//   if (!token) {
//     return res.redirect('/login');
//   }

//   try {

//     const decoded = jwt.verify(
//       token,
//       JWT_SECRET
//     );

//     const user =
//       await usersCollection.findOne({
//         _id: new ObjectId(
//           decoded.userId
//         )
//       });

//     if (!user) {

//       res.clearCookie('token');

//       return res.redirect('/login');
//     }

//     req.user = user;

//     next();

//   } catch (error) {

//     res.clearCookie('token');

//     return res.redirect('/login');
//   }
// }


// // =========================
// // Role Middleware
// // =========================

// function isAdmin(
//   req,
//   res,
//   next
// ) {

//   if (
//     req.user.role === 'admin'
//   ) {
//     return next();
//   }

//   res
//     .status(403)
//     .send('Access Denied');
// }

// function isUser(
//   req,
//   res,
//   next
// ) {

//   if (
//     req.user.role === 'user'
//   ) {
//     return next();
//   }

//   res
//     .status(403)
//     .send('Access Denied');
// }


// // =========================
// // Public Routes
// // =========================

// app.get('/', (req, res) => {

//   res.send('Home Page');
// });

// app.get('/login', (req, res) => {

//   res.render('login');
// });


// // =========================
// // Login
// // =========================

// app.post(
//   '/login',
//   async (req, res) => {

//     const {
//       username,
//       password
//     } = req.body;

//     const user =
//       await usersCollection.findOne({
//         username: username
//       });

//     if (!user) {

//       return res
//         .status(401)
//         .send('User Not Found');
//     }

//     if (
//       user.password !== password
//     ) {

//       return res
//         .status(401)
//         .send('Invalid Password');
//     }

//     const token = jwt.sign(
//       {
//         userId:
//           user._id.toString()
//       },
//       JWT_SECRET,
//       {
//         expiresIn: '1h'
//       }
//     );

//     res.cookie(
//       'token',
//       token,
//       {
//         httpOnly: true,
//         sameSite: 'strict',
//         secure: false
//       }
//     );

//     if (
//       user.role === 'admin'
//     ) {

//       return res.redirect(
//         '/admin-dashboard'
//       );
//     }

//     return res.redirect(
//       '/user-dashboard'
//     );
//   }
// );


// // =========================
// // Admin Routes
// // =========================

// app.get(
//   '/admin-dashboard',
//   isAuthenticated,
//   isAdmin,
//   (req, res) => {

//     res.send(`
//       Welcome Admin:
//       ${req.user.username}
//     `);
//   }
// );


// // =========================
// // User Routes
// // =========================

// app.get(
//   '/user-dashboard',
//   isAuthenticated,
//   isUser,
//   (req, res) => {

//     res.send(`
//       Welcome User:
//       ${req.user.username}
//     `);
//   }
// );


// // =========================
// // Logout
// // =========================

// app.post(
//   '/logout',
//   (req, res) => {

//     res.clearCookie('token');

//     res.redirect('/login');
//   }
// );


// // =========================
// // Server
// // =========================

// app.listen(
//   3000,
//   () => {

//     console.log(
//       'Server running on port 3000'
//     );
//   }
// );