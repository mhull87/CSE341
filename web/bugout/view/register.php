<?php
require_once 'connections/dbconnect.php';

$db = get_db();

include 'common/header.php';
?>

<main>
  <h2>Register for an Account</h2>

  <?php
  if (isset($message))
  {
    echo $message;
  }
  ?>

  <form action="accounts/index.php" method="POST">
    <p>*All fields required</p>
    <label for="userfname">First Name</label><br>
    <input type="text" name="userfname" id="userfname"><br><br>
    <label for="userlname">Last Name</label><br>
    <input type="text" name="userlname" id="userlname"><br><br>
    <label for="useremail">Email</label><br>
    <input type="email" name="useremail" id="useremail"><br><br>
    <label for="userpassword">Password</label><br>
    <input type="password" name="userpassword" id="userpassword"><br><br>
    <input type="submit" name="submit" value="Register" id="regbtn">
  </form>
</main>

<?php
include 'common/footer.php';
?>