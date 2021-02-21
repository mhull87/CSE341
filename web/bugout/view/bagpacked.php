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
  <h3>My Bug Out Bag - Packed</h3>

  <!-- list out the items in the bag -->
  <?php
    echo $itemslist;
  ?>

  <button class="btn sort"><a href="../bag/index.php?action=bagneeded">See All Needed</a></button><br><br>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>