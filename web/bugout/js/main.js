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

function loginlogout()
  {
    document.getElementById('login').classList.toggle('hidden');
    document.getElementById('logout').classList.toggle('hidden');
  }