<?php session_start();

include '../common/header.php'; ?>

<main>
  <h1>Your Shopping Cart</h1>

  <?php

if (! empty($_POST['selection'])) {
    foreach ($_POST['selection'] as $selected) {
        $_SESSION[$selected] = $selected;
    }
}
foreach ($_SESSION as $key=>$val) {
    echo '<div><p class="shoppingcartp" id="'
          .$key.'">'
          .$val.'<form name="remove'
          .$key.'" action="removeItem.php" method="POST"><input type="submit" name="remove'
          .$key.'" value="Remove"></form></p></div>';
}
?>

  <footer>
    <button onclick="location.href = 'browse.php'" title="Continue Shopping">Continue Shopping</button>
    <button onclick="location.href = 'checkOut.php'" title="Check Out">Check Out</button>
  </footer>
</main>
</body>

</html>