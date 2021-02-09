<?php

require_once '../connections/dbconnect.php';

$db = get_db();

$extranotpacked = "SELECT i.item_name, e.packed, e.quantity, i.item_use, e.item_location
          FROM extras e JOIN items i ON e.item_id = i.item_id WHERE e.packed = 'yes';

$stmt = $db->prepare($extranotpacked);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

include '../common/header.php';

?>

<main>
  <h2>My Survival Page</h2>
  <h3>My Extras - Needed</h3>

  <!-- list out the extras they have -->
  <ul>
    <?php 
    foreach ($items as $item)
    {
      $name = $item['item_name'];
      $packed = $item['packed'];
      $quantity = $item['quantity'];
      $use = $item['item_use'];
      $location = $item['item_location'];

      echo "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use<br>Location: $location</p></li>";
    }
?>

  </ul>
  <a href="extraspacked.php">Extras Packed</a>
  <a href="../mygear.php">All</a>

</main>

<?php
include 'common/footer.php';
?>