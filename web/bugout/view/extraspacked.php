<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';
?>

<main>
  <h2>My Survival Page</h2>
  <h3>My Extras - Packed</h3>

  <!-- list out the extras they have -->
  <ul>
    <?php
    echo $itemslist;
    ?>

  </ul>
  <a href="../bag/index.php?action=extrasneeded">Extras Needed</a><br><br>
  <a href="/bugout/view/mygear.php">My Gear</a>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>