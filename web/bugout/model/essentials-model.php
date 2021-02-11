<?php

function getEssentails()
{
$db = get_db();

$query = 'SELECT item_name, item_use, item_id FROM items';

$stmt = $db->prepare($query);
$stmt->execute();

$items = $stmt->fetchAll(PDO::FETCH_ASSOC); 
$stmt->closeCursor();

return $items;
}
?>
