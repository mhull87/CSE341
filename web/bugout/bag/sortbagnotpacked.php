<?php

require_once '../connections/dbconnect.php';

$db = get_db();

$seenotpacked = "SELECT i.item_name, b.quantity FROM bugout_bag b JOIN items i ON b.item_id = i.item_id WHERE b.packed = 'no'";

$stmt = $db->prepare($seenotpacked);
$stmt->execute();
$bagitems = $stmt->fetchAll(PDO::FETCH_ASSOC);

include '../common/header.php';

?>

<main>
  <h2>My Survival Page</h2>
  <h3>My Bug Out Bag - Needs</h3>

  <!-- list out the items in the bag -->
  <?php
    
    echo "<ul>";

  foreach ($bagitems as $bagitem)
  {
    $name = $bagitem['item_name'];
    $packed = $bagitem['packed'];
    $quantity = $bagitem['quantity'];
    $use = $bagitem['item_use'];

    echo "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use</p></li>";
  }

  echo "</ul>";

?>

  <a href="bag/sortbagpacked.php">See All Packed</a>
  <a href="../mygear.php">My Gear</a>

</main>

<?php
include 'common/footer.php';
?>