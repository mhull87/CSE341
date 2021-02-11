<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';

if (isset($message))
{
  echo $message;
}
?>

<main>
  <h2>Add Items To Your Bug Out Bag</h2>

    <?php
      echo $addtobagform;
    ?>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>