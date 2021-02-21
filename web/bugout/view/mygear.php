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
  <h2>My Survival Page</h2>
  <h3>My Bug Out Bag</h3>

<div class="sort">
  <p>Sort By</p>
  <button class="btn"><a href="../bag/index.php?action=bagpacked">Bag Packed</a></button>
  <button class="btn"><a href="../bag/index.php?action=bagneeded">Bag Needed</a></button>
</div>

  <!-- list out the items in the bag -->
  <div class="items">
    <?php
      echo $bagitemslist;
    ?>
  </div>

  <h3>My Extras</h3>

<div class="sort">
  <button class="btn"><a href="../bag/index.php?action=extraspacked">Extras Packed</a></button>
  <button class="btn"><a href="../bag/index.php?action=extrasneeded">Extras Needed</a></button>
</div>

  <!-- list out the extras they have -->
  <div class="items">
    <p>Sort by</p>
    <?php 
      echo $extraitemslist;
    ?>
  </div>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>