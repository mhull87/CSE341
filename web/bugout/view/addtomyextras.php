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
  <h2>Add Items To Your Extras</h2>

  <?php
  echo $addtoextrasform;
  ?>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php'
?>