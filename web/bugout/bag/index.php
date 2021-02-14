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
      <input type='number' min='0' name='quantity' id='quantity' required><br><br>
  
      <p>Is It Packed?</p>
  
      <input type='radio' name='packed' id='packed' value='yes' checked>
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
      $message = "<p>Item name, quantity, and packed value are all required.</p>";
      include '../view/addtobag.php';
      exit;
    }
    else
    {
      $addOutcome = addtobag($id, $packed, $quantity);
      header('Location: /bugout/bag/index.php?action=mygear');
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
      "<form action='/bugout/bag/index.php' method='POST'>

        <label for='item_name'>Item Name</label><br>
        <input name='item_name' id='item_name' value='$name' type='text' readonly><br><br>

        <label for='quantity'>Quantity</label><br>
        <input type='number' min='0' name='quantity' id='quantity' required><br><br>

        <p>Is It Packed?</p>

        <input type='radio' name='packed' id='packed' value='yes' checked>
        <label for='packed'>Yes</label><br>

        <input type='radio' name='packed' id='need' value='no'>
        <label for='need'>No</label><br><br>

        <label for='item_location'>Location</label><br>
        <input type='text' name='item_location' id='item_location' required><br><br>

        <input type='hidden' name='id' value='$id'>

        <input type='hidden' name='use' value='$use'>

        <input type='submit' id='addtomyextrasbtn' value='Add To My Extras'>

        <input type='hidden' name='action' value='addtoextras'>

      </form>";

      if (empty($packed) || empty($item_location) || empty($quantity))
      {
        $message = "<p>Item name, quantity, packed value, and location are required.</p>";
        include '../view/addtomyextras.php';
        exit;
      }
      else
      {
        $addOutcome = addtoextras($id, $packed, $quantity, $item_location);
        header('Location: /bugout/bag/index.php?action=mygear');
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
  
  case 'edit':
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    var_dump($id, $name, $quantity);

    edit($id);
    $editbagform = 
    "<form action='/bugout/bag/index.php' method='POST'>
  
      <label for='item_name'>Item Name</label><br>
      <input name='item_name' id='item_name' value='$name' type='text' readonly><br><br>
  
      <label for='quantity'>Quantity</label><br>
      <input type='number' min='0' name='quantity' value='$quantity' id='quantity' required><br><br>
  
      <p>Is It Packed?</p>
  
      <input type='radio' name='packed' id='packed' value='yes' checked>
      <label for='packed'>Yes</label><br>
  
      <input type='radio' name='packed' id='need' value='no'>
      <label for='need'>No</label><br><br>
    
      <input type='submit' id='updateitemgbtn' value='Update Item'>
  
      <input type='hidden' name='action' value='update'>
  
    </form>";

    include '../view/editbag.php';
    exit;
    break;

  case 'delete':
    $id = $_POST['id'];
    delete($id);
    header('Location: ../bag/index.php');
    exit;
    break;

  case 'update':
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    update($id, $packed, $quantity);
    header('Location: /bugout/bag/index.php');
    exit;
    break;

  default:
    $bagitems = mygearbag();

    $bagitemslist = '<ul>';

    foreach ($bagitems as $bagitem)
    {
      $name = $bagitem['item_name'];
      $packed = $bagitem['packed'];
      $quantity = $bagitem['quantity'];
      $use = $bagitem['item_use'];
      $id = $bagitem['bag_id'];

      $bagitemslist .= "<li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use</p></li>";
      $bagitemslist .= "<form action='/bugout/bag/index.php' method='POST'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='hidden' name='name' value='$name'>
                        <input type='hidden' name='quantity' value='$quantity'>
                        <input type='submit' value='Edit Item'>
                        <input type='hidden' name='action' value='edit'>
                        </form>";
      $bagitemslist .= "<form action='/bugout/bag/index.php' method='POST'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' value='Delete Item'>
                        <input type='hidden' name='action' value='delete'>
                        </form>";
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
    exit;
    break;
}