<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Team Activity | Week07</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <h1>Log in</h1>
    <?php 
    if (isset($message)) {
        echo "<b>$message</b>";
    }
    else if (isset($_SESSION['message'])){
        echo "<b>$_SESSION[message]</b>";
    }
    ?>
    <form action="index.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Username" required>
        <label for="userPassword">Password:</label>
        <input type="password" id="userPassword" name="userPassword" placeholder="Password" required>
        <input type="submit" value="Login">
        <input type="hidden" name="action" value="Login">
        <p>Not registered? <a href="index.php?action=register">Create an account</a></p>
    </form>
</body>

</html>