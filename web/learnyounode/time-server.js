var net = require('net');
var port = Number(process.argv[2]);

function zero(i) {
  if (i < 10) {
    return '0' + i;
  } else {
    return i;
  }
}

function now() {
  var date = new Date();
  return date.getFullYear() + '-' 
  + zero(date.getMonth() + 1) + '-'
  + zero(date.getDate()) + ' '
  + zero(date.getHours()) + ':'
  + zero(date.getMinutes());
}
  var server = net.createServer(function (socket)
  {
    socket.end(now() + '\n')
  })
  
server.listen(port);