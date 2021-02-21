<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bug Out Survival</title>
  <link href="/bugout/css/main.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Staatliches&display=swap" rel="stylesheet">
  <script src="/bugout/js/main.js"></script>

</head>

<body>
  <header>
    <h1>Bug Out Survival</h1>
    <button class="btn 

    <?php if (isset($_SESSION['user_id']))
      {
        echo ' hidden ';
      }
      ?>

     login" id="login"><a href="/bugout/accounts/index.php?action=login" title="Go to the login page.">Login</a></button>

    <button class="btn 

    <?php if (!isset($_SESSION['user_id']))
      {
        echo ' hidden ';
      }
      ?>

 logout" id="logout"><a href="/bugout/accounts/index.php?action=logout" title="Log out of Bugout Survival.">Logout</a></button>
  </header>

  <nav>
    <?php include 'nav.php'; ?>
  </nav>