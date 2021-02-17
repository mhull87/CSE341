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

function extraspacked()
{
  $db = get_db();

  $query = "SELECT i.item_name, e.packed, e.quantity, i.item_use, e.item_location
            FROM extras e JOIN items i ON e.item_id = i.item_id 
            WHERE e.packed = 'yes'";

  $stmt = $db->prepare($query);
  $stmt->execute();

  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();

  return $items;
}

function bagneeded()
{
  $db = get_db();

  $query = "SELECT i.item_name, b.packed, b.quantity, i.item_use 
            FROM bugout_bag b JOIN items i ON b.item_id = i.item_id 
            WHERE b.packed = 'no'";

  $stmt = $db->prepare($query);
  $stmt->execute();

  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();

  return $items;
}

function bagpacked()
{
  $db = get_db();

  $query = "SELECT i.item_name, b.packed, b.quantity, i.item_use 
            FROM bugout_bag b JOIN items i ON b.item_id = i.item_id 
            WHERE b.packed = 'yes'";

  $stmt = $db->prepare($query);
  $stmt->execute();

  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();

  return $items;
}

function mygearbag($user_id)
{
  $db = get_db();

  $bag = 'SELECT i.item_name, b.packed, b.quantity, i.item_use, b.bag_id
          FROM bugout_bag b 
          WHERE user_id = :user_id
          JOIN items i ON b.item_id = i.item_id
          ORDER BY b.bag_id';

  $stmtbag = $db->prepare($bag);
  $stmtbag->bindValue(':user_id', $user_id, PDO::PARAM_INT);
  $stmtbag->execute();

  $bagitems = $stmtbag->fetchAll(PDO::FETCH_ASSOC);
  $stmtbag->closeCursor();

  return $bagitems;
}

function mygearextras()
{
  $db = get_db();
  
  $extra = 'SELECT i.item_name, e.packed, e.quantity, i.item_use, e.item_location, e.extra_id
            FROM extras e JOIN items i ON e.item_id = i.item_id
            ORDER BY e.extra_id';

  $stmtextra = $db->prepare($extra);
  $stmtextra->execute();

  $itemsextra = $stmtextra->fetchAll(PDO::FETCH_ASSOC);
  $stmtextra->closeCursor();

  return $itemsextra;
}

function edit($id)
{
  $db = get_db();

  $edit = 'SELECT FROM bugout_bag
          WHERE bag_id = :id';

  $stmt = $db->prepare($edit);

  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}

function editextras($id)
{
  $db = get_db();

  $edit = 'SELECT FROM extras
          WHERE extra_id = :id';

  $stmt = $db->prepare($edit);

  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}

function update($id, $quantity, $packed)
{
  $db = get_db();

  $update = 'UPDATE bugout_bag
            SET quantity = :quantity,
                packed = :packed
            WHERE bag_id = :id';

  $stmt = $db->prepare($update);

  $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
  $stmt->bindValue(':packed', $packed, PDO::PARAM_STR);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}

function updateextras($id, $quantity, $packed, $item_location)
{
  $db = get_db();

  $update = 'UPDATE extras
            SET quantity = :quantity,
            packed = :packed,
            item_location = :item_location
            WHERE extra_id = :id';

  $stmt = $db->prepare($update);

  $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
  $stmt->bindValue(':packed', $packed, PDO::PARAM_STR);
  $stmt->bindValue(':item_location', $item_location, PDO::PARAM_STR);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}

function delete($id)
{
  $db = get_db();

  $delete = 'DELETE FROM bugout_bag
            WHERE bag_id = :id';

  $stmt = $db->prepare($delete);

  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}

function deleteextra($id)
{
  $db = get_db();

  $delete = 'DELETE FROM extras
            WHERE extra_id = :id';

  $stmt = $db->prepare($delete);

  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}
?>