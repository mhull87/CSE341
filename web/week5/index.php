<?php

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

// foreach ($db->query('SELECT username, password FROM note_user') as $row)
// {
//   echo 'foreach example';
//   echo 'user: '.$row['username'];
//   echo ' password: '.$row['password'];
//   echo '<br/>';
// }

// $statement = $db->query('SELECT username, password FROM note_user');
// while ($row = $statement->fetch(PDO::FETCH_ASSOC))
// {
//   echo 'while example <br/> user: '.$row['username'].' password: '.$row['password'].'<br/>';
// }

// $statement2 = $db->query('SELECT username, passowrd FROM note_user');
// $results = $statement2->fetchAll(PDO::FETCH_ASSOC);


$stmt = $db->prepare('SELECT * FROM note_user WHERE id=:id AND name=:name');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $stmt2 = $db->prepare('SELECT * FROM note_user WHERE id=:id AND name=:name');
// $stmt2->execute(array(':name' => $name, ':id' => $id));
// $rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>