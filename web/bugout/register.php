<?php
include 'common/header.php';
?>

<main>
  <form action="#" method="POST">
    <p>*All fields required</p>
    <label for="fname">First Name</label><br>
    <input type="text" name="fname" id="fname"><br><br>
    <label for="lname">Last Name</label><br>
    <input type="text" name="lname" id="lname"><br><br>
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email"><br><br>
    <label for="password">Password</label><br>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" name="submit" value="Register" id="regbtn">
  </form>
</main>

<?php
include 'common/footer.php';
?>