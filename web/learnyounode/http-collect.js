const bl = require('bl');
var http = require('http');
var url = process.argv[2];

function data(callback) {
  http.get(url, function response(response) {
    response.pipe(bl (function (err, data) {
      if (err) {
        return console.error(err);
      }
      data = data.toString();
      callback(data);
    }))
  })
}

  function printdata(data) {
    console.log(data.length);
    console.log(data);
  }

  data(printdata);