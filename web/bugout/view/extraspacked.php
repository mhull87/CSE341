<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';

if (isset($message))
{
  echo $message;
}
else if (isset($_SESSION['message']))
{
  echo "<p class='message'>".$_SESSION['message']."</p>";
}
?>

<main>
  <h2>My Survival Page</h2>
  <h3>My Extras - Packed</h3>

  <!-- list out the extras they have -->
    <?php
      echo $itemslist;
    ?>

  <a href="../bag/index.php?action=extrasneeded">Extras Needed</a><br><br>
  <a href="../bag/index.php?action=mygear">My Gear</a>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>