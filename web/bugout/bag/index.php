<?php
session_start();
$user_id = $_SESSION['user_id'];
unset($_SESSION['message']);


//This is the bag controller
require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/connections/dbconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/model/bag-model.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($action == null) 
  {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

switch ($action)
  {
    case 'login':
      include '../accounts/index.php?action=login';
      break;

    case 'addtobag':
      if (!isset($_SESSION['user_id']))
        {
          $_SESSION['message'] = 'Login to add gear to your bugout bag.';
          include '../view/login.php';
          exit;
        }

      $user_id = $_SESSION['user_id'];

      $id = $_POST['id'];
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $use = filter_input(INPUT_POST, 'use', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $quantity = filter_input(INPUT_POST, 'quantity',  FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $packed = $_POST['packed'];

      $addtobagform = 
      "<form action='/bugout/bag/index.php' method='POST'>
    
        <label for='item_name'>Item Name</label><br>
        <input name='item_name' id='item_name' value='$name' type='text' readonly><br><br>
    
        <label for='quantity'>Quantity</label><br>
        <input type='number' min='0' max='10000' name='quantity' id='quantity' required><br><br>
    
        <p>Is It Packed?</p>
    
        <input type='radio' name='packed' id='packed' value='yes' checked>
        <label for='packed'>Yes</label><br>
    
        <input type='radio' name='packed' id='need' value='no'>
        <label for='need'>No</label><br><br>
    
        <input type='hidden' name='id' value='$id'>
    
        <input type='hidden' name='use' value='$use'>
    
        <input type='submit' id='addtobagbtn' value='Add To My Bug Out Bag' class='btn'>
    
        <input type='hidden' name='action' value='addtobag'>
    
      </form>";

      if (empty($packed))
      {
        $message = "<p>Item name, quantity, and packed value are all required.</p>";
        include '../view/addtobag.php';
        exit;
      }
      else
      {
        $addOutcome = addtobag($id, $packed, $quantity, $user_id);
        header('Location: /bugout/bag/index.php');
        die();
      }

      break;

    case 'addtoextras':
      if (!isset($_SESSION['user_id']))
        {
          $_SESSION['message'] = 'Login to add gear to your extras list.';
          include '../view/login.php';
          exit;
        }

      $user_id = $_SESSION['user_id'];
      
      $id = $_POST['id'];
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $use = filter_input(INPUT_POST, 'use', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $quantity = filter_input(INPUT_POST, 'quantity',  FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $packed = $_POST['packed'];
      $item_location = filter_input(INPUT_POST, 'item_location', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $addtoextrasform =
      "<form action='/bugout/bag/index.php' method='POST'>

        <label for='item_name'>Item Name</label><br>
        <input name='item_name' id='item_name' value='$name' type='text' readonly><br><br>

        <label for='quantity'>Quantity</label><br>
        <input type='number' min='0' max='10000' name='quantity' id='quantity' required><br><br>

        <p>Is It Packed?</p>

        <input type='radio' name='packed' id='packed' value='yes' checked>
        <label for='packed'>Yes</label><br>

        <input type='radio' name='packed' id='need' value='no'>
        <label for='need'>No</label><br><br>

        <label for='item_location'>Location</label><br>
        <input type='text' name='item_location' id='item_location' maxlength='255' required><br><br>

        <input type='hidden' name='id' value='$id'>

        <input type='hidden' name='use' value='$use'>

        <input type='submit' id='addtomyextrasbtn' value='Add To My Extras' class'btn'>

        <input type='hidden' name='action' value='addtoextras'>

      </form>";

      if (empty($packed))
      {
        $message = "<p>Item name, quantity, packed value, and location are required.</p>";
        include '../view/addtomyextras.php';
        exit;
      }
      else
      {
        $addOutcome = addtoextras($id, $packed, $quantity, $item_location, $user_id);
        header('Location: /bugout/bag/index.php');
      }
      
      break;

    case 'extrasneeded':
      $items = extrasneeded($user_id);

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
      $items = extraspacked($user_id);

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
      $items = bagneeded($user_id);

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
      $items = bagpacked($user_id);

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
    
    case 'editextras':
      $id = $_POST['id'];
      $name = $_POST['name'];
      $quantity = filter_input(INPUT_POST, 'quantity',  FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $packed = $_POST['packed'];
      $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      editextras($id, $user_id);
      $editextrasform =
      "<form action='/bugout/bag/index.php' method='POST'>

        <label for='item_name'>Item Name</label><br>
        <input name='name' id='item_name' value='$name' type='text' readonly><br><br>

        <label for='quantity'>Quantity</label><br>
        <input type='number' min='0' max='10000' name='quantity' value='$quantity' id='quantity' required><br><br>

        <p>Is It Packed?</p>

        <input type='radio' name='packed' id='packed' value='yes' checked>
        <label for='packed'>Yes</label><br>

        <input type='radio' name='packed' id='need' value='no'>
        <label for='need'>No</label><br><br>

        <label for='item_location'>Location</label><br>
        <input type='text' name='location' maxlength='255' value='$location' id='item_location' required><br><br>

        <input type='hidden' name='id' value='$id'>

        <input type='submit' id='addtomyextrasbtn' value='Add To My Extras' class='btn'>

        <input type='hidden' name='action' value='updateextras'>

      </form>";

      include '../view/editextras.php';
      exit;
      break;
    
    case 'edit':
      $id = $_POST['id'];
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $quantity = filter_input(INPUT_POST, 'quantity',  FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $packed = $_POST['packed'];

      edit($id, $user_id);
      $editbagform = 
      "<form action='/bugout/bag/index.php' method='POST'>
    
        <label for='item_name'>Item Name</label><br>
        <input name='name' id='item_name' value='$name' type='text' readonly><br><br>
    
        <label for='quantity'>Quantity</label><br>
        <input type='number' min='0' max='1000000000' name='quantity' value='$quantity' id='quantity' required><br><br>
    
        <p>Is It Packed?</p>
    
        <input type='radio' name='packed' id='packed' value='yes' checked>
        <label for='packed'>Yes</label><br>
    
        <input type='radio' name='packed' id='need' value='no'>
        <label for='need'>No</label><br><br>

        <input type='hidden' name='id' value='$id'>
      
        <input type='submit' id='updateitemgbtn' value='Update Item' class='btn'>
    
        <input type='hidden' name='action' value='update'>
    
      </form>";

      include '../view/editbag.php';
      exit;
      break;

    case 'deleteextra':
      $id = $_POST['id'];

      deleteextra($id, $user_id);
      header('Location: ../bag/index.php');
      exit;
      break;
    
    case 'delete':
      $id = $_POST['id'];

      delete($id, $user_id);
      header('Location: ../bag/index.php');
      exit;
      break;

    case 'updateextras':
      $id = $_POST['id'];
      $quantity = $_POST['quantity'];
      $location = $_POST['location'];
      $packed = $_POST['packed'];

      updateextras($id, $quantity, $packed, $location, $user_id);
      header('Location: ../bag/index.php');
      exit;
      break;
    
    case 'update':
      $id = $_POST['id'];
      $quantity = $_POST['quantity'];
      $packed = $_POST['packed'];

      update($id, $quantity, $packed, $user_id);
      header('Location: ../bag/index.php');
      exit;
      break;

    default:
      if (!isset($_SESSION['user_id']))
        {
          $_SESSION['message'] = 'Login to see your gear.';
          include '../view/login.php';
          exit;
        }

      $bagitems = mygearbag($user_id);

      $bagitemslist = '<ul>';

      foreach ($bagitems as $bagitem)
      {
        $name = $bagitem['item_name'];
        $packed = $bagitem['packed'];
        $quantity = $bagitem['quantity'];
        $use = $bagitem['item_use'];
        $id = $bagitem['bag_id'];

        $bagitemslist .= 
        "<div class='items'>
          <li>
            <ul>
              <li class='grid'>
                <p><b>Item:</b></p>
                <p>$name</p>
              </li>
              <li class='grid'>
                <p><b>Packed:</b></p>
                <p>$packed</p>
              </li>
              <li class='grid'>
                <p><b>Quantity:</b></p>
                <p>$quantity</p>
              </li>
              <li class='grid'>
                <p><b>Use:</b></p>
                <p>$use</p>
              </li>
            </ul>
          </li><br><br>";
        $bagitemslist .= "<form class='center' action='/bugout/bag/index.php' method='POST'>
                          <input type='hidden' name='id' value='$id'>
                          <input type='hidden' name='name' value='$name'>
                          <input type='hidden' name='quantity' value='$quantity'>
                          <input type='hidden' name='packed' value='$packed'>
                          <input type='submit' value='Edit Item' class='btn'>
                          <input type='hidden' name='action' value='edit'>
                          </form>";
        $bagitemslist .= "<form class='center' action='/bugout/bag/index.php' method='POST'>
                          <input type='hidden' name='id' value='$id'>
                          <input type='submit' value='Delete Item' class='btn'>
                          <input type='hidden' name='action' value='delete'>
                          </form></div>";
      }

      $bagitemslist .= '</ul>';

      $itemsextra = mygearextras($user_id);

      $extraitemslist = '<ul>';

      foreach ($itemsextra as $itemextra)
      {
        $name = $itemextra['item_name'];
        $packed = $itemextra['packed'];
        $quantity = $itemextra['quantity'];
        $use = $itemextra['item_use'];
        $location = $itemextra['item_location'];
        $id = $itemextra['extra_id'];

        $extraitemslist .= "<div class='items'><li><p>Item: $name<br>Packed: $packed<br>Quantity: $quantity<br>Use: $use<br>Location: $location</p></li>";
        $extraitemslist .= "<form class='center' action='/bugout/bag/index.php' method='POST'>
                          <input type='hidden' name='id' value='$id'>
                          <input type='hidden' name='name' value='$name'>
                          <input type='hidden' name='quantity' value='$quantity'>
                          <input type='hidden' name='packed' value='$packed'>
                          <input type='submit' value='Edit Item' class='btn'>
                          <input type='hidden' name='location' value='$location'>
                          <input type='hidden' name='action' value='editextras'>
                          </form>";
        $extraitemslist .= "<form class='center' action='/bugout/bag/index.php' method='POST'>
                          <input type='hidden' name='id' value='$id'>
                          <input type='submit' value='Delete Item' class='btn'>
                          <input type='hidden' name='action' value='deleteextra'>
                          </form></div>";
      }

      $extraitemslist .= '</ul>';

      include '../view/mygear.php';
      exit;
      break;
  }