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
    "<form action='/bugout/bag/index.php' method='POST'>
  
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

    if (empty($packed) || empty($quantity))
    {
      $message = "<h3>Item name, quantity, and packed value are required.</h3>";
      include '../view/addtobag.php';
      exit;
    }
    else
    {
      $addOutcome = addtobag($id, $packed, $quantity);
        if ($addOutcome === 1)
        {
          $message = "<h3>Item added to your bugout bag.</h3>
                      <form action='/bugout/bag/index.php?action=mygear' method='POST'>
                      <input type='hidden' name='action' value='mygear'>
                      </form>";
        }
        else
        {
          $message = "<h3>Sorry, the addition failed. Please try again.</h3>
                      <form action='/bugout/bag/index.php?action=mygear' method='POST'>
                      <input type='hidden' name='action' value='mygear'>
                      </form>";
        }

      include 'index.php';
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

      $addtoextrasform =
      "<form action='/bugout/bag/index.php?action=addtoextras' method='POST'>

        <label for='item_name'>Item Name</label><br>
        <input name='item_name' id='item_name' value='$name' type='text' readonly><br><br>

        <label for='quantity'>Quantity</label><br>
        <input type='number' min='0' name='quantity' id='quantity'><br><br>

        <p>Is It Packed?</p>

        <input type='radio' name='packed' id='packed' value='yes'>
        <label for='packed'>Yes</label><br>

        <input type='radio' name='packed' id='need' value='no'>
        <label for='need'>No</label><br><br>

        <label for='item_location'>Location</label><br>
        <input type='text' name='item_location' id='item_location'><br><br>

        <input type='hidden' name='id' value='$id'>

        <input type='hidden' name='use' value='$use'>

        <input type='submit' id='addtomyextrasbtn' value='Add To My Extras'>

        <input type='hidden' name='action' value='addtoextras'>

      </form>";

      if (empty($packed || empty($item_location) || empty($quantity)))
      {
        $message = "<h3>Item name, quantity, packed value, and location are required.</h3>";
        include '../view/addtomyextras.php';
        exit;
      }
      else
      {
        $addOutcome = addtoextras($id, $packed, $quantity, $item_location);

          if ($addOutcome === 1)
          {
            $message = "<h3>Item added to your extras.</h3>";
          }
          else
          {
            $message = "<h3>Sorry, the addition failed. Please try again.</h3>";
          }

          include $_SERVER['DOCUMENT_ROOT'].'/bugout/bag/index.php?action=mygear';
          exit;
      }
      
      break;

  case 'extrasneeded':
    $items = extrasneeded();

    $itemslist = '<ul>';

    foreach ($items as $item)
    {
      $name = $item['item_name'];
      $packed = $item['packed'];
      $quantity = $item['quantity'];
      $use = $item['item_use'];
      $location = $item['item_location'];

      $itemslist .= "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use<br>Location: $location</p></li>";
    }

    $itemslist .= '</ul>';

    include '../view/extrasneeded.php';
    break;

  case 'extraspacked':
    $items = extraspacked();

    $itemslist = '<ul>';

    foreach ($items as $item)
    {
      $name = $item['item_name'];
      $packed = $item['packed'];
      $quantity = $item['quantity'];
      $use = $item['item_use'];
      $location = $item['item_location'];

      $itemslist .= "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use<br>Location: $location</p></li>";
    }

    $itemslist .= '</ul>';

    include '../view/extraspacked.php';
    break;

  case 'bagneeded':
    $items = bagneeded();

    $itemslist = '<ul>';

    foreach ($items as $item)
    {
      $name = $item['item_name'];
      $packed = $item['packed'];
      $quantity = $item['quantity'];
      $use = $item['item_use'];
  
      $itemslist .= "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use</p></li>";
    }

    $itemslist .= '</ul>';

    include '../view/bagneeded.php';
    break;
  
  case 'bagpacked':
    $items = bagpacked();

    $itemslist = '<ul>';

    foreach ($items as $item)
    {
      $name = $item['item_name'];
      $packed = $item['packed'];
      $quantity = $item['quantity'];
      $use = $item['item_use'];
  
      $itemslist .= "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use</p></li>";
    }

    $itemslist .= '</ul>';

    include '../view/bagpacked.php';
    break;
  
  case 'mygear':
    $bagitems = mygearbag();

    $bagitemslist = '<ul>';

    foreach ($bagitems as $bagitem)
    {
      $name = $bagitem['item_name'];
      $packed = $bagitem['packed'];
      $quantity = $bagitem['quantity'];
      $use = $bagitem['item_use'];

      $bagitemslist .= "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use</p></li>";
    }

    $bagitemslist .= '</ul>';

    $itemsextra = mygearextras();

    $extraitemslist = '<ul>';

    foreach ($itemsextra as $itemextra)
    {
      $name = $itemextra['item_name'];
      $packed = $itemextra['packed'];
      $quantity = $itemextra['quantity'];
      $use = $itemextra['item_use'];
      $location = $itemextra['item_location'];

      $extraitemslist .= "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use<br>Location: $location</p></li>";
    }

    $extraitemslist .= '</ul>';

    include '../view/mygear.php';
    break;


  default:
    include '../view/addtobag.php';
}