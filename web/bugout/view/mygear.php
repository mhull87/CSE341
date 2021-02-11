<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/connections/dbconnect.php';

$db = get_db();

$bag = 'SELECT i.item_name, b.packed, b.quantity, i.item_use
          FROM bugout_bag b JOIN items i ON b.item_id = i.item_id';
$stmtbag = $db->prepare($bag);
$stmtbag->execute();
$bagitems = $stmtbag->fetchAll(PDO::FETCH_ASSOC);


$extra = 'SELECT i.item_name, e.packed, e.quantity, i.item_use, e.item_location
          FROM extras e JOIN items i ON e.item_id = i.item_id';
$stmtextra = $db->prepare($extra);
$stmtextra->execute();
$itemsextra = $stmtextra->fetchAll(PDO::FETCH_ASSOC);

include '../common/header.php';
?>

<main>
  <h2>My Survival Page</h2>
  <h3>My Bug Out Bag</h3>

  <!-- list out the items in the bag -->
  <ul>
    <?php
  
    foreach ($bagitems as $bagitem)
    {
      $name = $bagitem['item_name'];
      $packed = $bagitem['packed'];
      $quantity = $bagitem['quantity'];
      $use = $bagitem['item_use'];

      echo "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use</p></li>";
    }

  ?>

  </ul>

  <a href="bag/sortbagpacked.php">Bag Packed</a><br><br>
  <a href="bag/sortbagnotpacked.php">Bag Needed</a>

  <h3>My Extras</h3>

  <!-- list out the extras they have -->
  <ul>
    <?php 
    foreach ($itemsextra as $itemextra)
    {
      $name = $itemextra['item_name'];
      $packed = $itemextra['packed'];
      $quantity = $itemextra['quantity'];
      $use = $itemextra['item_use'];
      $location = $itemextra['item_location'];

      echo "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use<br>Location: $location</p></li>";
    }
?>

  </ul>
  
  <a href="bag/extraspacked.php">Extras Packed</a><br><br>
  <a href="bag/extrasneeded.php">Extras Needed</a>

</main>

<?php
include '../common/footer.php';
?>