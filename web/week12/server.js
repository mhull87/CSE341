const express = require('express');
const app = express();
const path = require('path');
const session = require('express-session');

app.use(express.json());
app.use(express.urlencoded({
  extended: true
 }));

 app.use(session({
   secret: 'secret',
   resave: false,
   saveUninitialized: true
 }));

app.set('port', 5000);
app.use(express.static(path.join(__dirname, 'test')));

var logRequest = function (req, res, next) {
  console.log('Recieved a request for: ' + req.url);
  next();
}



app.use(logRequest);

app.post('/login', function (req, res) {
  var username = req.body.username;
  var password = req.body.password;
  console.log(username, password);
  if (username == 'admin' && password == 'password') {
    var result = {success: true};
    req.session.user = username;
  } else {
    var result = {success: false};
  }
  res.json(result);
});

app.post('/logout', function (req, res) {
  if (req.session.user) {
    req.session.destroy();
    result = {success: true};
  } else {
    result = {success: false};
  }
  res.json(result);
});


app.get('/getServerTime', verifyLogin, (req, res) => {
    var time = new Date();
    var result = { success: true, time: time };
    res.json(result);
  });

function verifyLogin(req, res, next) {
  if (req.session.user) {
    next();
  } else {
    var result = {success: false, message: 'You must be logged in.'};
    res.status(401).json(result);
  }
}


app.listen(app.get('port'), function () {
  console.log('Listening on port: ' + app.get('port'));
});
