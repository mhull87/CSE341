<?php
//This is the essentials controller
require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/connections/dbconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/model/essentials-model.php';

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

  case 'essentialslist':
    
    $items = getEssentails();

    $itemslist = '<ul>';

    foreach ($items as $item)
    {
      $itemslist .= "<li>$name<br>
      <form action='../essentials/index.php' method='POST'>
      <input type='hidden' name='id' value='$id'>
      <input type='hidden' name='name' value='$name'>
      <input type='hidden' name='use' value='$use'>
      <input type='submit' value='Details' name='details' id='details'><br><br>

      <input type='hidden' name='action' value='details'>
      </form>
      </li>";
    }

    $itemslist .= '</ul>';

    include $_SERVER['DOCUMENT_ROOT'].'/bugout/view/essentials.php';
    break;

  default:
    include '../index.php';
}

?>