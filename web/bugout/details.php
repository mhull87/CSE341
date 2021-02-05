<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $id = $_POST['id'];
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
  details ($id, $db);

  function details ($id, $db)
  {
    $stmt = $db->prepare('SELECT item_name, item_use FROM items WHERE id=:id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    echo "<p>$id</p>";
  }
  ?>
</main>

<?php
include 'common/footer.php';
?>