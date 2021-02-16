<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';
?>

<main>
  <h2>Register for an Account</h2>

  <?php
  if (isset($message))
  {
    echo $message;
  }
  ?>

  <form action="/bugout/accounts/index.php" method="POST">
    <p>*All fields required</p>
    <label for="userfname">First Name</label><br>
    <input type="text" name="userfname" id="userfname" required><br><br>
    <label for="userlname">Last Name</label><br>
    <input type="text" name="userlname" id="userlname" required><br><br>
    <label for="useremail">Email</label><br>
    <input type="email" name="useremail" id="useremail" required><br><br>
    <p>Password must be at least 5 characters and contain a number.</p>
    <label for="userpassword">Password</label><br>
    <input type="password" name="userpassword" id="userpassword" required><br><br>
    <label for="passconfirm">Confirm Password</label><br>
    <input type="password" name="passconfirm" id="passconfirm" required onkeyup="confirm();">
    <span id="check"></span>
    <input type="submit" name="submit" value="Register" id="regbtn">

    <input type="hidden" name="action" value="register">
  </form>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>