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
  <p class="padding">Sort By</p>
  <button class="btn" onclick="location.href='../bag/index.php?action=bagpacked'" title="See your packed bag">Bag Packed</button>
  <button class="btn" onclick="location.href='../bag/index.php?action=bagneeded'" title="See what you need to pack in your bag">Bag Needed</button>
</div>

  <!-- list out the items in the bag -->
    <?php
      echo $bagitemslist;
    ?>

  <h3>My Extras</h3>

<div class="sort">
  <p class="padding">Sort by</p>
  <button class="btn" onclick="location.href='../bag/index.php?action=extraspacked'" title="See your packed extras.">Extras Packed</button>
  <button class="btn" onclick="location.href='../bag/index.php?action=extrasneeded'" title="See your needed extras">Extras Needed</button>
</div>

  <!-- list out the extras they have -->
    <?php 
      echo $extraitemslist;
    ?>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>