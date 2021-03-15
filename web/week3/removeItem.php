<?php session_start();

include $_SERVER['DOCUMENT_ROOT']."/cse341/web/common/header.php"; ?>

<h1>Item Removed</h1>

<?php
foreach ($_SESSION as $key=>$val) {
    if (isset($_POST['remove'.$key])) {
        unset($_SESSION[$val]);
    }
}

?>
<footer>
  <button onclick="location.href = 'shoppingCart.php'" title="Back To Cart">Back To Cart</button>
  <button onclick="location.href = 'checkOut.php'" title="Check Out">Check Out</button>
</footer>
</main>
</body>

</html>