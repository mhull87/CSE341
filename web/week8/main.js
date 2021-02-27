const http = require('http');
const url = require("url");
const query = require('querystring');
const port = 8888;

const onRequest = (req, res) => {
  console.log(`Request received for: ${req.url}`);

  if (req.url == "/home") {
    res.writeHead(200, {
      'Content-Type': 'text/html'
    });
    res.write('<h1>Welcome to the home page.</h1>');
    res.end();

  } else if (req.url == "/getData") {
    res.writeHead(200, {'Content-Type': 'application/json'});
    const data = {"name": "Melissa Hull", "class": "cs341"};
    res.write(JSON.stringify(data));
    res.end();

  } else if (req.url.startsWith('/?')) { 
    res.writeHead(200, {'Content-Type': 'text/html'});
    var output = url.parse(req.url, true).query;
    res.write(`Your birthday is: ${output.day} ${output.month} ${output.year}`);
    res.end();

  } else {
    res.writeHead(404, {
      "Content-Type": "Page Not Found"
    });
    res.write('Page Not Found');
    res.end();
  }
}

const server = http.createServer(onRequest);
server.listen(port, () => {
  console.log(`Server listening on port: ${port}`);
});