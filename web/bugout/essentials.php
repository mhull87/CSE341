<?php
//require_once('connections/dbConnect.php');
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
        $name = $item['item_name'];
        $use = $item['item_use'];

        echo "<li><p>$name</p><p>$use</p></li>";
      }
    ?>
  </ul>

  <!-- make a way to add items directly to the bag -->
</main>

<?php
include 'common/footer.php';
?>