<?php
$id = $_POST['id'];
$name = $_POST['name'];
$use = $_POST['use'];

include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';

echo

"<main>
  <h2>Add Items To Your Extras</h2>

  <form action='/bugout/bag/index.php' method='POST'>

    <label for='item_name'>Item Name</label><br>
    <input name='item_name' id='item_name' value='$name' type='text' readonly><br><br>

    <label for='quantity'>Quantity</label><br>
    <input type='number' min='0' name='quantity' id='quantity'><br><br>

    <p>Is It Packed?</p>

    <input type='radio' name='packed' id='packed' value='yes'>
    <label for='packed'>Yes</label><br>

    <input type='radio' name='packed' id='need' value='no'>
    <label for='need'>No</label><br><br>

    <label for='item_location'>Location</label><br>
    <input type='text' name='item_location' id='item_location'><br><br>

    <input type='hidden' name='id' value='$id'>

    <input type='hidden' name='use' value='$use'>

    <input type='submit' id='addtomyextrasbtn' value='Add To My Extras'>

    <input type='hidden' name='action' value='addtoextras'>

  </form>

</main>";

include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php'
?>