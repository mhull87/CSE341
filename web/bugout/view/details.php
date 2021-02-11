<?php
  $id = $_POST['id'];
  $name = $_POST['name'];
  $use = $_POST['use'];

include '/bugout/common/header.php';
?>

<main>
  <h2>Item Details</h2>

<?php
    echo "<p>Item #: $id<br>Name: $name<br>Use: $use</p>
    <form action='addtobag.php' method='POST'>
    <input type='hidden' name='id' value='$id'>
    <input type='hidden' name='name' value='$name'>
    <input type='hidden' name='use' value='$use'>
    <input type='submit' value='Add To Bag'>
    </form>
    <form action='addtomyextras.php' method='POST'>
    <input type='hidden' name='id' value='$id'>
    <input type='hidden' name='name' value='$name'>
    <input type='hidden' name='use' value='$use'>
    <input type='submit' value='Add To Extras'>
    </form>";
  ?>
</main>

<?php
include '/bugout/common/footer.php';
?>