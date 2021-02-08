<?php
require_once '../connections/dbconnect.php';

$$id = $_POST['id'];
$name = $_POST['name'];
$use = $_POST['use'];
$quantity = $_POST['quantity'];
$packed = $_POST['packed'];

$db = get_db();

$query = "INSERT INTO bugout_bag (item_id, packed, quantity)
          VALUES ($id, $packed, $quantity)";

$stmt = $db->prepare($query);
$stmt->execute();
$stmt->closeCursor();

include '../mygear.php';
?>