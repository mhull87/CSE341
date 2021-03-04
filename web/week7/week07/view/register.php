<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Team Activity | Week07</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script>
        var check = function() {
            if (document.getElementById('userPassword').value ==
                document.getElementById('confirmPassword').value) {
                document.getElementById('responseDiv').style.color = 'green';
                document.getElementById('responseDiv').innerHTML = 'matching';
            } else {
                document.getElementById('responseDiv').style.color = 'red';
                document.getElementById('responseDiv').innerHTML = 'not matching';
            }
        }
    </script>
</head>

<body>
    <h1>Create an account</h1>
    <?php
    if (isset($message)) {
        echo "<b>$message</b>";
    }
    ?>
    <form action="index.php" method="post" id="register-form">
        <label for="username">Name</label>
        <input type="text" id="username" name="username" required>
        <p class='info'>Password must be at least 7 characters and contain a number.</p>
        <label for="userPassword">Password <?php if (isset($_SESSION['noMatch'])) {
                                                echo $_SESSION['noMatch'];
                                            } ?></label>
        <input type="password" id="userPassword" name="userPassword" pattern="(?=^.{7,}$)(?=.*\d)(?=.*[a-z]).*$" required onkeyup='check();'>
        <label for="confirmPassword">Confirm Password <?php if (isset($_SESSION['noMatch'])) {
                                                            echo $_SESSION['noMatch'];
                                                        } ?></label>
        <input type="password" id="confirmPassword" name="confirmPassword" required onkeyup='check();'>
        <div id="responseDiv"></div>
        <input type="submit" name="submit" value="Register" id="submitButton">
        <input type="hidden" name="action" value="Register">
        <p>Already have an account? <a href="index.php?action=login">Log in</a></p>
    </form>
</body>

</html>