<?php
require_once 'connections/dbconnect.php';

$db = get_db();

$bag = 'SELECT i.item_name, b.packed, b.quantity, i.item_use
          FROM bugout_bag b JOIN items i ON b.item_id = i.item_id';
$stmtbag = $db->prepare($bag);
$stmtbag->execute();
$bagitems = $stmtbag->fetchAll(PDO::FETCH_ASSOC);

$bagpacked = 'SELECT i.item_name, b.quantity FROM bugout_bag b JOIN items i ON b.item_id = i.item_id WHERE b.packed = "yes"';
$stmtbagpacked = $db->prepare($bagpacked);
$stmtbagpacked->execute();
$bagpackeditems = $stmtbagpacked->fetchAll(PDO::FETCH_ASSOC);

$bagnotpacked = 'SELECT i.item_name, b.quantity FROM bugout_bag b JOIN items i ON b.item_id = i.item_id WHERE b.packed = "no"';
$stmtbagnotpacked = $db->prepare($bagnotpacked);
$stmtbagnotpacked->execute();
$bagnotpackeditems = $stmtbagnotpacked->fetchAll(PDO::FETCH_ASSOC);

$extra = 'SELECT i.item_name, e.packed, e.quantity, i.item_use, e.item_location
          FROM extras e JOIN items i ON e.item_id = i.item_id';
$stmtextra = $db->prepare($extra);
$stmtextra->execute();
$itemsextra = $stmtextra->fetchAll(PDO::FETCH_ASSOC);

$extrapacked = 'SELECT i.item_name, e.packed, e.quantity, i.item_use, e.item_location
          FROM extras e JOIN items i ON e.item_id = i.item_id WHERE e.packed = "yes"';
$stmtpackedextra = $db->prepare($extrapacked);
$stmtpackedextra->execute();
$itemspackedextra = $stmtpackedextra->fetchAll(PDO::FETCH_ASSOC);

$extranotpacked = 'SELECT i.item_name, e.packed, e.quantity, i.item_use, e.item_location
          FROM extras e JOIN items i ON e.item_id = i.item_id WHERE e.packed = "no"';
$stmtnotpackedextra = $db->prepare($extranotpacked);
$stmtnorpackedextra->execute();
$itemsextranotpacked = $stmtnotpackedextra->fetchAll(PDO::FETCH_ASSOC);

include 'common/header.php';
?>

<main>
  <h2>My Survival Page</h2>
  <h3>My Bug Out Bag</h3>

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

    echo "</ul>
    <ul class='showpacked'>";

    foreach ($bagpackeditems as $bagpackeditem)
    {
      $name = $bagpackeditem['item_name'];
      $packed = $bagpackeditem['packed'];
      $quantity = $bagpackeditem['quantity'];
      $use = $bagpackeditem['item_use'];

      echo "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use</p></li>";
    }
    echo "</ul>
    <ul class='hidden'>";

    foreach ($bagnotpackeditems as $bagnotpackeditem)
    {
      $name = $bagnotpackeditem['item_name'];
      $packed = $bagnotpackeditem['packed'];
      $quantity = $bagnotpackeditem['quantity'];
      $use = $bagnotpackeditem['item_use'];

      echo "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use</p></li>";
    }
    echo "</ul>";
  ?>

  <button class="showpacked" onclick="showpacked()">See All Packed</button>
  <a href="#">See All Needed</a>
  <a href="#">See All</a>

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
  <a href="#">Sort By Packed</a>
  <a href="#">Sort By Needed</a>
  <a href="#">See All</a>

</main>

<?php
include 'common/footer.php';
?>