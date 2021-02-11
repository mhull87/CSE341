<?php
//This is the bag controller

require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/connections/dbconnect.php';

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
      $message = "<h3>Item name and packed value are required.</h3>";
      include '../bag/index.php';
      exit;
    }
    else
    {
      $addOutcome = addtobag($id, $name, $use, $quantity, $packed);

        if ($addOutcome === 1)
        {
          $message = "<h3>$name added to your bugout bag.</h3>";
        }
        else
        {
          $message = "<h3>Sorry, the addition failed. Please try again.</h3>";
        }
      include '../view/addtobag.php';
      exit;
    }
    break;

  case 'addtoextras':
      $id = $_POST['id'];
      $name = $_POST['name'];
      $use = $_POST['use'];
      $quantity = $_POST['quantity'];
      $packed = $_POST['packed'];
      $item_location = $_POST['item_location'];

      if (empty($packed || empty($item_location)))
      {
        $message = "<h3>Item name, packed value, and location are required.</h3>";
        include '../bag/index.php';
        exit;
      }
      else
      {
        $addOutcome = addtoextras($id, $packed, $quantity, $item_location);

          if ($addOutcome === 1)
          {
            $message = "<h3>$name added to your extras.</h3>";
          }
          else
          {
            $message = "<h3>Sorry, the addition failed. Please try again.</h3>";
          }
        header('Location: ../mygear.php');
        exit;
      }
      break;
}