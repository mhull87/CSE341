var http = require('http');
var url = process.argv[2];

function data(callback) {
  http.get(url, function response(response) {
    response.setEncoding('utf8');
    response.on('error', console.error);
    response.on('data', function data(data) {
      callback(data);
    })
  }).on('error', console.error);
}

function printdata(data) {
  console.log(data);
}

data(printdata);