<?php
//This is the bag model

function addtobag($id, $packed, $quantity)
{
  $db = get_db();

  $query = "INSERT INTO bugout_bag (item_id, packed, quantity)
            VALUES (:id, :packed, :quantity)";

  $stmt = $db->prepare($query);

  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':packed', $packed, PDO::PARAM_STR);
  $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
  $stmt->execute();

  $rowsChanged = $stmt->rowCount();

  $stmt->closeCursor();

  return $rowsChanged;
}

function addtoextras($id, $packed, $quantity, $item_location)
{
  $db = get_db();

  $query = "INSERT INTO extras (item_id, packed, quantity, item_location)
            VALUES (:id, :packed, :quantity, :item_location)";

  $stmt = $db->prepare($query);

  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':packed', $packed, PDO::PARAM_STR);
  $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
  $stmt->bindValue(':item_location', $item_location, PDO::PARAM_STR);
  $stmt->execute();

  $rowsChanged = $stmt->rowCount();

  $stmt->closeCursor();

  return $rowsChanged;
}

function extrasneeded()
{
  $db = get_db();

  $query = "SELECT i.item_name, e.packed, e.quantity, i.item_use, e.item_location
            FROM extras e JOIN items i ON e.item_id = i.item_id 
            WHERE e.packed = 'no'";

  $stmt = $db->prepare($query);
  $stmt->execute();

  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();

  return $items;
}
?>