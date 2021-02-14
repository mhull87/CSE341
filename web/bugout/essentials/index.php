<?php
//This is the essentials controller
require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/connections/dbconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/model/essentials-model.php';
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

  case 'details':
    $id = $_POST['id'];
    $name = $_POST['name'];
    $use = $_POST['use'];

    $details = "<p>Item #: $id<br>Name: $name<br>Use: $use</p>
    <form action='../bag/index.php' method='POST'>
    <input type='hidden' name='id' value='$id'>
    <input type='hidden' name='name' value='$name'>
    <input type='hidden' name='use' value='$use'>
    <input type='submit' value='Add To Bag'>

    <input type='hidden' name='action' value='addtobag'>

    </form>

    <form action='../bag/index.php' method='POST'>
    <input type='hidden' name='id' value='$id'>
    <input type='hidden' name='name' value='$name'>
    <input type='hidden' name='use' value='$use'>
    <input type='submit' value='Add To Extras'>

    <input type='hidden' name='action' value='addtoextras'>
    </form>";

    include '../view/details.php';
    break;

  default:
    $items = getEssentails();

    $itemslist = '<ul>';
    
    foreach ($items as $item)
    {
      $name = $item['item_name'];
      $use = $item['item_use'];
      $id = $item['item_id'];

      $itemslist .= "<li>$name<br>
      <form action='/bugout/essentials/index.php' method='POST'>
      <input type='hidden' name='id' value='$id'>
      <input type='hidden' name='name' value='$name'>
      <input type='hidden' name='use' value='$use'>
      <input type='submit' value='Details' name='details' id='details'><br><br>

      <input type='hidden' name='action' value='details'>
      </form>
      </li>";
    }

    $itemslist .= '</ul>';

    include '../view/essentials.php';
    break;
}

?>