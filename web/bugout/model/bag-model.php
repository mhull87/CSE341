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
?>