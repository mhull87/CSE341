<?php session_start();

include $_SERVER['DOCUMENT_ROOT']."/cse341/web/common/header.php"; ?>

<main>
<h1>Your Shopping Cart</h1>
<?php 
foreach($_POST['selection'] as $selected)
{
  $_SESSION[$selected] = $selected;
  //echo $selected."<br>";
}

print_r($_SESSION);
?>

<footer>
<button onclick="location.href = 'browse.php'" title="Continue Shopping">Continue Shopping</button>
</footer>
</main>
</body>
</html>