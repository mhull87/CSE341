<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';
?>

<main>
  <h2>Add Items To Your Extras</h2>

  <?php
  echo $addtoextrasform;
  ?>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php'
?>