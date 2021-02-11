<?php
//This is the bag controller

require_once '../connections/dbconnect.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null) 
{
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action)
{
  case 'login':
    include '../view/login.php';
    break;

  case 'addtobag':
    $id = $_POST['id'];
    $name = $_POST['name'];
    $use = $_POST['use'];
    $quantity = $_POST['quantity'];
    $packed = $_POST['packed'];

    if (empty($packed))
    {
      $message = "<h3>Item name and packed value is required.</h3>";
      include '../bag/index.php';
      exit;
    }
    else
    {
      $addOutcome = addtobag($id, $name, $use, $quantity, $packed);
      header('Location: ../mygear.php');
      exit;
    }

}