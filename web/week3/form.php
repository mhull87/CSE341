<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Week 3 Team Activity</title>
  <link href="../css/main.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Staatliches&display=swap" rel="stylesheet">
</head>

<body>
  <p>Name: <?php echo $_POST["name"]; ?></p>
  <p>Email: <a href="mailto:<?php echo $_POST["email"]; ?>"><?php echo$_POST["email"]; ?></a></p>
  <p>Major: <?php echo $_POST["major"]; ?></p>
  <p>Comments: <?php echo $_POST["comments"]; ?></p>
  <p>Continents Visited: <br><?php foreach($_POST["continents"] as $selected)
  {
    echo "\t".$selected.",</br>"; 
  } ?>
  </p>
</body>

</html>