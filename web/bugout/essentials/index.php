<?php
//This is the essentials controller
session_start();
unset($_SESSION['message']);

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

    $details = 
      "<div class='items'>
      <li class='padding'>
        <ul>
          <li class='grid'>
            <p><b>Item #:</b></p>
            <p>$id</p>
          </li>
          <li class='grid'>
            <p><b>Name:</b></p>
            <p>$name</p>
          </li>
          <li class='grid'>
            <p><b>Use:</b></p>
            <p>$use</p>
          </li>
        </ul>
      </li><br><br>

    <form class='center' action='../bag/index.php' method='POST'>
    <input type='hidden' name='id' value='$id'>
    <input type='hidden' name='name' value='$name'>
    <input type='hidden' name='use' value='$use'>
    <input type='submit' value='Add To Bag' class='btn bouncy'>

    <input type='hidden' name='action' value='addtobag'>

    </form>

    <form class='center' action='../bag/index.php' method='POST'>
    <input type='hidden' name='id' value='$id'>
    <input type='hidden' name='name' value='$name'>
    <input type='hidden' name='use' value='$use'>
    <input type='submit' value='Add To Extras' class='btn bouncy delay'>

    <input type='hidden' name='action' value='addtoextras'>
    </form></div>";

    include '../view/details.php';
    break;

  default:
    $items = getEssentails();

    $itemslist = '<ul class="essentials">';
    
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
      <input type='submit' value='Details' name='details' class='btn bouncy'><br><br>

      <input type='hidden' name='action' value='details'>
      </form>
      </li>";
    }

    $itemslist .= '</ul>';

    include '../view/essentials.php';
    break;
}

?>