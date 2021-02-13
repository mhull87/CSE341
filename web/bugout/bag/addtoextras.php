<?php
require_once '../connections/dbconnect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$use = $_POST['use'];
$quantity = $_POST['quantity'];
$packed = $_POST['packed'];
$item_location = $_POST['item_location'];

$query = "INSERT INTO extras (item_id, packed, quantity, item_location)
          VALUES (:id, :packed, :quantity, :item_location)";

$db = get_db();
$stmt = $db->prepare($query);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':packed', $packed, PDO::PARAM_STR);
$stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
$stmt->bindValue(':item_location', $item_location, PDO::PARAM_STR);
$stmt->execute();
$stmt->closeCursor();

header('Location: ../mygear.php');
?>