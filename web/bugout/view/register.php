<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';
?>

<main>
  <h2>Register for an Account</h2>

  <?php
  if (isset($message))
  {
    echo $message;
  }
else if (isset($_SESSION['message']))
  {
    echo "<p class='message'>".$_SESSION['message']."</p>";
  }
  ?>

  <form action="/bugout/accounts/index.php" method="POST">
    <label for="userfname">First Name</label><br>
    <input type="text" maxlength="25" name="userfname" id="userfname" required><br><br>
    <label for="userlname">Last Name</label><br>
    <input type="text" maxlength='25' name="userlname" id="userlname" required><br><br>
    <label for="useremail">Email</label><br>
    <input type="email" maxlength="50" name="useremail" id="useremail" required><br><br>
    <p>Password must be at least 5 characters and contain a number.</p>
    <label for="userpassword">Password</label><br>
    <input type="password" maxlength='25' name="userpassword" id="userpassword" required pattern="(?=^.{5,}$)(?=.*\d)(?=.*[a-z]).*$"><br><br>
    <label for="passconfirm">Confirm Password</label><br>
    <input type="password" name="passconfirm" id="passconfirm" required onkeyup="confirm()">
    <span id="check"></span><br><br>
    <input type="submit" name="submit" value="Register" id="regbtn" class="btn">

    <input type="hidden" name="action" value="register"><br><br>
    <a href="login.php" title="Go to login page">Already have an account?</a>
  </form>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>