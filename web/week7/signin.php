<?php
session_start();

if (isset($message) || isset($badlogin))
{
  echo $message;
  echo $badlogin;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-In</title>
</head>

<body>
  <h1>Sign-In</h1>

  <form method='post' action="controller.php">
    <label for="username">Username: </label>
    <input type="text" id="username" name="username">
    <label for="pass">Password: </label>
    <input type="password" id="pass" name="pass">
    <input type="submit" value="Login">
    <input type="hidden" name="action" value="login">
  </form>

  <a href="signup.php">Not a member yet? Sign Up</a>
</body>

</html>