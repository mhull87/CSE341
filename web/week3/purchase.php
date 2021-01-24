<?php session_start();

include $_SERVER['DOCUMENT_ROOT']."/cse341/web/common/header.php";

$name = htmlspecialchars($_POST['name']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zip = htmlspecialchars($_POST['zip']);
?>

<main>
  <h1>Thank you for your purchase.</h1>

  <?php
foreach ($_SESSION as $key=>$val) {
    echo '<div><p class="shoppingcartp" id="'
          .$key.'">'
          .$val.'</p></div>';
}

echo  '<hr><p>'
      .$name.'<br>'
      .$address.'<br>'
      .$city.', '
      .$state.' '
      .$zip.'</p>';
?>

</main>
</body>

</html>