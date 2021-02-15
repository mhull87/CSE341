

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scripture Resources</title>
</head>

<body>
  <h1>Sign-up</h1>

  <form method='post' action="controller.php">
    <label for="username">Username: </label>
    <input type="text" id="text" name="text">
    <label for="pass">Password: </label>
    <input type="password" id="pass" name="pass">
    <input type="submit" value="Sign In">
    <input type="hidden" name="action" value="login">
  </form>
</body>

</html>