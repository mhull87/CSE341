<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';
?>

<main>
  <h2>Survival Essentials</h2>

  <!-- list the items table -->
  <ul>
    <?php
      echo $itemslist;
    ?>
  </ul>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>