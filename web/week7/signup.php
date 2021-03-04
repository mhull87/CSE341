<?php
session_start();

if (isset($message))
{
  echo $message;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-Up</title>
</head>

<body>
  <h1>Sign-Up</h1>
  <?php echo $message ?>

  <form method='post' action="controller.php">
    <label for="username">Username: </label>
    <input type="text" id="username" name="username">
    <label for="pass">Password: </label><?php $star ?>
    <input type="password" id="pass" name="pass">
    <label for="passconfirm"></label><?php $star ?>
    <input type="password" id="passconfirm" name="passconfirm">
    <input type="submit" value="Register">
    <input type="hidden" name="action" value="register">
  </form>

  <a href="signin.php">Sign In Here</a>
</body>

</html>