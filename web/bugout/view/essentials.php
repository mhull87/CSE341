<?php
require_once 'connections/dbconnect.php';
require_once 'model/essentials-model.php';

include 'common/header.php';
?>

<main>
  <h2>Survival Essentials</h2>

  <?php
  if (isset($message))
  {
    echo $message;
  }
  ?>

  <!-- list the items table -->
  <ul>
    <?php
   
    $db = get_db();
    
    $query = 'SELECT item_name, item_use, item_id FROM items';
    $stmt = $db->prepare($query);
    
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $stmt->closeCursor();
    
      foreach ($items as $item)
      {
        $name = $item['item_name'];
        $use = $item['item_use'];
        $id = $item['item_id'];

        echo "<li>$name<br>
        <form action='details.php' method='POST'>
        <input type='hidden' name='id' value='$id'>
        <input type='hidden' name='name' value='$name'>
        <input type='hidden' name='use' value='$use'>
        <input type='submit' value='Details' name='details' id='details'><br><br>
        </form>
        </li>";
      }
    
    ?>
  </ul>

  <!-- make a way to add items directly to the bag -->
</main>

<?php
include 'common/footer.php';
?>