<?php
require_once('connections/dbConnect.php');
$db = get_db();

$query = 'SELECT item_name, item_use FROM items';
$stmt = $db->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'common/header.php';
?>

<main>
  <h2>Survival Essentials</h2>

  <!-- list the items table -->
  <ul>
    <?php
      foreach ($items as $item)
      {
        $id = $item['item_name'];
        $use = $item['item_use'];

        echo "<li><p>$id $use</p></li>";
      }
    ?>
  </ul>

  <!-- make a way to add items directly to the bag -->
</main>

<?php
include 'common/footer.php';
?>