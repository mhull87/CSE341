var bl = require('bl');
var http = require('http');
var results = [];
var count = 0;

//run httpget three times to get each url. the urls are process.argv[2, 3, 4]
for (var index = 0; index < 3; index++) {
    httpget(index);
}

function httpget (index) {
  http.get (process.argv[2 + index], function response(response) {
    response.pipe(bl (function err(err, data) {
      if (err)
      {
        return console.error(err);
      }
      results[index] = data.toString();
      count++;

      if (count == 3) {
        printdata();
      }
    }))
  })
}
  
function printdata() {
  for (var i = 0; i < 3; i++) {
    console.log(results[i]);
  }
}

