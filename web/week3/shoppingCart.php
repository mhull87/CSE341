<?php session_start();

include $_SERVER['DOCUMENT_ROOT']."/cse341/web/common/header.php"; ?>

<main>
  <h1>Your Shopping Cart</h1>

  <?php
 //$_SESSION = array();
 //print_r($_SESSION);

if (! empty($_POST['selection'])) {
    foreach ($_POST['selection'] as $selected) {
        $_SESSION[$selected] = $selected;
    }
}
//echo print_r($_SESSION);
foreach ($_SESSION as $key=>$val) {
  echo '<p class="shoppingcartp" id="'.$key.'">'.$val.'<button class="removebtn" onclick="deleteItem('.$key.')">Remove</button></p><br>';
}


//if isset ()
?>

  <footer>
    <button onclick="location.href = 'browse.php'" title="Continue Shopping">Continue Shopping</button>
    <button onclick="location.href = 'checkOut.php'" title="Check Out">Check Out</button>
  </footer>
</main>

<script>
function deleteItem(e) {
  switch(e.innerText) {
    case 'PencilRemove':
      <?php unset($_SESSION['Pencil']); ?>
      document.getElementById('Pencil').remove();
      break;
    case 'CrayonsRemove':
      <?php unset($_SESSION['Crayons']); ?>
      document.getElementById('Crayons').remove();
      break;
    case 'MarkersRemove':
      <?php unset($_SESSION['Markers']); ?>
      document.getElementById('Markers').remove();
      break;
    case 'PenRemove':
      <?php unset($_SESSION['Pen']); ?>
      document.getElementById('Pen').remove();
      break;
    case 'NotebookRemove':
      <?php unset($_SESSION['Notebook']); ?>
      document.getElementById('Notebook').remove();
      break;
    case 'ScissorsRemove':
      <?php unset($_SESSION['Scissors']); ?>
      document.getElementById('Scissors').remove();
      break;
    case 'FolderRemove':
      <?php unset($_SESSION['Folder']); ?>
      document.getElementById('Folder').remove();
      break;
  }
}
</script>
</body>

</html>