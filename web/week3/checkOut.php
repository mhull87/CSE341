<?php session_start(); 

include $_SERVER['DOCUMENT_ROOT']."/cse341/web/common/header.php"; ?>

<main>
  <h1>Check Out</h1>

  <form action="purchase.php" method="POST">
    <label for="name">Name: </label>
    <input type="text" name="name" id="name"><br>
    <label for="address">Address: </label>
    <input type="text" name="address" id="address"><br>
    <label for="city">City: </label>
    <input type="text" name="city" id="city"><br>
    <label for="state">State: </label>
    <input type="text" name="state" id="state"><br>
    <label for="zip">Zip Code: </label>
    <input type="number" name="zip" id="zip"><br><br>
    <input type="submit" value="Check Out"><br><br><br>
  </form>
</main>

<footer>
  <button onclick="location.href = 'shoppingCart.php'" title="Back to Cart">Return to Cart</button>
</footer>
</body>

</html>