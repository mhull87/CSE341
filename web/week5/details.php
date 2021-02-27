<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
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

include '../common/header.php';

?>



<body>
  <h1>Scripture Details</h1>



  <?php 

  details($id, $db);


 function details($id, $db)
{
  $stmt = $db->prepare('SELECT book, chapter, verse, content FROM Scriptures WHERE id=:id');
 $stmt->bindValue(':id', $id, PDO::PARAM_INT);
 $stmt->execute();
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($rows AS $row)
  {
    echo '<b>'.$row['book'].' '.$row['chapter'].':'.$row['verse'].'</b> - "'.$row['content'].'"<br><br>';
  }

}

  ?>
</body>

</html>