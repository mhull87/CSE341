<?php
require_once '../connections/dbconnect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$use = $_POST['use'];
$quantity = $_POST['quantity'];
$packed = $_POST['packed'];



$query = "INSERT INTO bugout_bag (item_id, packed, quantity)
          VALUES (:id, :packed, :quantity)";

$db = get_db();
$stmt = $db->prepare($query);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':packed', $packed, PDO::PARAM_STR);
$stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
$stmt->execute();
$stmt->closeCursor();

header('Location: ../mygear.php');
?>