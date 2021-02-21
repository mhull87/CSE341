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

<div class="sort">
  <button class="btn" onclick="location.href='../bag/index.php?action=bagneeded'" title="See what you need to pack in your bag.">See All Needed</button>
</div><br><br>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>