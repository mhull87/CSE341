<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';
?>

<main>
  <h2>Survival Essentials</h2>

  <!-- list the items table -->
    <?php
      echo $itemslist;
    ?>


</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>