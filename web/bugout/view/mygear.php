<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';

if (isset($message))
{
  echo $message;
}
?>

<main>
  <h2>My Survival Page</h2>
  <h3>My Bug Out Bag</h3>

  <!-- list out the items in the bag -->
    <?php
      echo $bagitemslist;
    ?>

  <a href="../bag/index.php?action=bagpacked">Bag Packed</a><br><br>
  <a href="../bag/index.php?action=bagneeded">Bag Needed</a>

  <h3>My Extras</h3>

  <!-- list out the extras they have -->
    <?php 
      echo $extraitemslist;
    ?>
  
  <a href="../bag/index.php?action=extraspacked">Extras Packed</a><br><br>
  <a href="../bag/index.php?action=extrasneeded">Extras Needed</a>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>