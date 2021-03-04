var fs = require('fs');
var path = require('path');


module.exports = (folder, ext, callback) => {
  fs.readdir(folder, function doneReading(err, files) {
    if (err) {
      return callback(err);
    }
    files = files.filter(function f(file) {
      return path.extname(file) === '.' + ext;
    })
    callback(null, files);
  })
}