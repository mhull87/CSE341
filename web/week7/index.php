<?php
session_start();

if (isset($message))
{
  echo $message;
}



if(isset($_SESSION['username']))
{
  $username = $_SESSION['username'];
}
else
{
  header('Location: signin.php');
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>
  <h1>Welcome home</h1>
  <p>Your username is: <?php $_SESSION['username'] ?></p>

</body>

</html>