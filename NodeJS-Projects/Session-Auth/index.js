import express from 'express';
import session from 'express-session';

const app = express();

app.set('view engine', 'ejs');

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.use(  
  session({
    name: "alok_session",
    secret: "my-secret-key",
    resave: false,
    saveUninitialized: false
  })
);

function isAuthenticated(req, res, next) {

  if (req.session.user) {
    return next();
  }

  res.redirect('/login');
}

function isAdmin(req, res, next) {

  if (
    req.session.user &&
    req.session.user.role === 'admin'
  ) {
    return next();
  }

  res.send('Access Denied');
}

function isUser(req, res, next) {

  if (
    req.session.user &&
    req.session.user.role === 'user'
  ) {
    return next();
  }

  res.send('Access Denied');
}

app.get('/', (req, res) => {
    res.render('home');
});

app.get('/about', (req, res) => {
    res.render('about');
});

app.get('/login', (req, res) => {
    res.render('login');
});

app.post('/login', (req, res) => {

    const { username, password, role } = req.body;

    if (
        username === 'aman' &&
        password === 'admin123' &&
        role === 'admin'
    ) {

        req.session.user = {
            username,
            role
        };

        return res.redirect('/admin-dashboard');
    }

    if (
        username === 'ravi' &&
        password === 'user123' &&
        role === 'user'
    ) {

        req.session.user = {
            username,
            role
        };

        return res.redirect('/user-dashboard');
    }

    res.redirect('/login');
});

app.get("/admin", isAuthenticated, isAdmin, (req, res) => {
    res.render("admin");
});
app.get("/admin-dashboard", isAuthenticated, isAdmin, (req, res) => {
    res.render("admin-dashboard");
});

app.get("/user", isAuthenticated, isUser, (req, res) => {
    res.render("user");
});
app.get("/user-dashboard", isAuthenticated, isUser, (req, res) => {
    res.render("user-dashboard");
});

app.post('/logout', (req, res) => {

  req.session.destroy((err) => {

    if (err) {
      return res.send('Logout Failed');
    }

    res.redirect('/login');
  });

});

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});