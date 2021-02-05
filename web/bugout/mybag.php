<?php
require_once 'connections/dbConnect.php';
$db = get_db();

$query = 'SELECT i.item_name, b.packed, b.quantity, i.item_use
          FROM bugout_bag b JOIN items i ON b.item_id = i.item_id';
$stmt = $db->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'common/header.php';
?>

<main>
  <h2>My Survival Page</h2>
  <h3>My Bug Out Bag</h3>

  <!-- list out the items in the bag -->
  <ul>
  <?php
    foreach ($items as $item)
    {
      $name = $item['item_name'];
      $packed = $item['packed'];
      $quantity = $item['quantity'];
      $use = $item['use'];

      echo "<li><p>$name</p><p>$packed</p><p>$quantity</p><p>$use</p></li>";
    }
  ?>
  </ul>

  <a href="addtobag.php">Add Items</a><br><br>
  
  <h3>My Extras</h3>

  <!-- list out the extras they have -->

  <a href="addtomyextras.php">My Extras</a>
</main>

<?php
include 'common/footer.php';
?>