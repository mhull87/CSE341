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
  <h2>Edit Your Bug Out Bag</h2>

    <?php
      echo $editextrasform;
    ?>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>