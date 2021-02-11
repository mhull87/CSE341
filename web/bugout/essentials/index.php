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
    include '../view/login.php';
    break;

  case 'essentialslist':
    $items = getEssentails();

    foreach ($items as $item)
    {
      $name = $item['item_name'];
      $use = $item['item_use'];
      $id = $item['item_id'];

      echo "<li>$name<br>
      <form action='details.php' method='POST'>
      <input type='hidden' name='id' value='$id'>
      <input type='hidden' name='name' value='$name'>
      <input type='hidden' name='use' value='$use'>
      <input type='submit' value='Details' name='details' id='details'><br><br>
      </form>
      </li>";
    }
    include $_SERVER['DOCUMENT_ROOT'].'/bugout/view/essentials.php';
}

?>