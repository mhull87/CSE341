<?php

require_once '../connections/dbconnect.php';
include '../common/header.php';

$db = get_db();

$seepacked = 'SELECT i.item_name, b.quantity FROM butout_bag b JOIN items i ON b.item_id = i.item_id WHERE b.packed = "yes" || b.packed = "Yes" || b.packed = "YES"';

$stmt = $db->prepare($seepacked);
$stmt->execute();
$bagitems = 

?>