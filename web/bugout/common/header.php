<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bug Out Survival</title>
  <link href="css/main.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Staatliches&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".showpacked").click(function(){
    $(".showpacked").toggle();
    $(".allitems").toggle();
  });
});
</script>
</head>

<body>
  <header>
    <h1>Bug Out Survival</h1>
    <a class="login" href="login.php">Login</a>
  </header>

  <nav>
    <?php include 'nav.php'; ?>
  </nav>