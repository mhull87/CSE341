<?php
  $id = $_POST['id'];
  $name = $_POST['name'];
  $use = $_POST['use'];


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
    echo "<p>Item #: $id<br>Name: $name<br>Use: $use</p>";
  ?>
</main>

<?php
include 'common/footer.php';
?>