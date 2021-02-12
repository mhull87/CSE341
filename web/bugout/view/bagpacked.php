<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';
?>

<main>
  <h2>My Survival Page</h2>
  <h3>My Bug Out Bag - Packed</h3>

  <!-- list out the items in the bag -->
  <?php
    echo $itemslist;
  ?>

  <a href="../bag/index.php?action=bagneeded">See All Needed</a><br><br>
  <a href="/bugout/view/mygear.php">My Gear</a>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>