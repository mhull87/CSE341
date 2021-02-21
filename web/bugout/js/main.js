function confirm()
  {
    if (document.getElementById('userpassword').value ==
        document.getElementById('passconfirm').value)
        {
          document.getElementById('check').style.color = 'green';
          document.getElementById('check').innerHTML = '&#10004';
        }
        else
        {
          document.getElementById('check').style.color = 'red';
          document.getElementById('check').innerHTML = '&#10060';
        }
  }

var d = new Date();

//copyright year
document.getElementById("year").textContent = d.getFullYear();

//Current date on footer
var dow = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var day = dow[d.getDay()];
var number = d.getDate();
var m = month[d.getMonth()];
var year = d.getFullYear();

document.getElementById("date").innerHTML = (day + ", " + number + " " + m + " " + year);