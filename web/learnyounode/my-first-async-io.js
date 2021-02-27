var fs = require('fs');
var lines;

function getLines(callback) {
  fs.readFile(process.argv[2], function doneReading(err, contents) {
    if (err) {
      return console.error(err);
    }
    lines = contents.toString().split('\n').length - 1;
    callback();
  })
}

function logLines() {
  console.log(lines);
}

getLines(logLines);