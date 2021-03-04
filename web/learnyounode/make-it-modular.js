var getFiles = require('./mymodule');
var folder = process.argv[2];
var ext = process.argv[3];


getFiles(folder, ext, function f (err, files) {
  if (err) {
    return console.error('Error: ', err);
  }  
  files.forEach(function (file) {
    console.log(file);
  })
}) 