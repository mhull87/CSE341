<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $id = $_POST['id'];
  $name = $_POST['name'];
  $use = $_POST['use'];
}

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

include 'common/header.php';
?>

<main>
  <h2>Item Details</h2>

<?php
  details ($id, $name, $use, $db);

  function details ($id, $name, $use, $db)
  {
    $stmt = $db->prepare('SELECT item_id, item_name, item_use FROM items WHERE item_id=:id');
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<p>$id $name $use</p>";
  
}
  ?>
</main>

<?php
include 'common/footer.php';
?>