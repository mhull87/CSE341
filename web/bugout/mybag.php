<?php
//require_once 'connections/dbconnect.php';
//$db = get_db();

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

$query = 'SELECT i.item_name, b.packed, b.quantity, i.item_use, b.item_location
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
      $use = $item['item_use'];

      echo "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use</p></li>";
    }
  ?>
  </ul>

  <a href="addtobag.php">Add Items</a><br><br>
  
  <h3>My Extras</h3>

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
  <a href="addtomyextras.php">My Extras</a>
</main>

<?php
include 'common/footer.php';
?>