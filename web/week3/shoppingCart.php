<?php session_start();

include $_SERVER['DOCUMENT_ROOT']."/cse341/web/common/header.php"; ?>


<main>
<h1>Your Shopping Cart</h1>
<?php 
foreach($_POST['selection'] as $selected)
  $_SESSION[$selected] = $selected;
//echo print_r($_SESSION);
foreach($_SESSION as $key=>$val)
echo '<p id="'.$key.'">'.$val.'<button id="'.$key.'" onclick="removeItem('.$key.')">Remove</button></p><br>';

?>

<footer>
<button onclick="location.href = 'browse.php'" title="Continue Shopping">Continue Shopping</button>
</footer>
</main>
<script>
function removeItem(key) {
  <?php 
  unset ($_SESSION[$key])
  ?>
location.reload();
}
</script>
</body>
</html>