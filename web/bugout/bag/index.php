<?php
//This is the bag controller

require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/connections/dbconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/model/bag-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null) 
{
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action)
{
  case 'login':
    include '../accounts/index.php?action=login';
    break;

  case 'addtobag':
    $id = $_POST['id'];
    $name = $_POST['name'];
    $use = $_POST['use'];
    $quantity = $_POST['quantity'];
    $packed = $_POST['packed'];

    $addtobagform = 
    "<form action='?action=addtobag' method='POST'>
  
      <label for='item_name'>Item Name</label><br>
      <input name='item_name' id='item_name' value='$name' type='text' readonly><br><br>
  
      <label for='quantity'>Quantity</label><br>
      <input type='number' min='0' name='quantity' id='quantity'><br><br>
  
      <p>Is It Packed?</p>
  
      <input type='radio' name='packed' id='packed' value='yes'>
      <label for='packed'>Yes</label><br>
  
      <input type='radio' name='packed' id='need' value='no'>
      <label for='need'>No</label><br><br>
  
      <input type='hidden' name='id' value='$id'>
  
      <input type='hidden' name='use' value='$use'>
  
      <input type='submit' id='addtobagbtn' value='Add To My Bug Out Bag'>
  
      <input type='hidden' name='action' value='addtobag'>
  
    </form>";

    if (empty($packed))
    {
      echo 'in the if';
      $message = "<h3>Item name and packed value are required.</h3>";
      include '../view/addtobag.php';
      exit;
    }
    else
    {
      $addOutcome = addtobag($id, $name, $use, $quantity, $packed);
        echo 'in the outer else';
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
        header('Location: /bugout/view/mygear.php');
        exit;
      }
      break;

    default:
      include '../view/addtobag.php';
}