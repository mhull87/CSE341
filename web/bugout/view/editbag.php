<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';
?>

<main>
  <h2>Edit Your Bug Out Bag</h2>

    <?php
      echo $editbagform;
    ?>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>