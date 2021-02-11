<?php
require_once '/connections/dbconnect.php';

$db = get_db();

include '/bugout/common/header.php';
?>

<main>
  <h2>Log Into Bug Out Survival</h2>

  <form action="#" method="POST">
    <label for="email">Email</label><br>
    <input name="email" id="email" type="email"><br><br>
    <label for="password">Password</label><br>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="Login">
  </form><br>

  <a href="register.php">Not a member yet?</a>

</main>

<?php
include '/bugout/common/footer.php';
?>