<?php
//Accounts controller

require_once $_SERVER['DOCUMENT_ROOT'].'/bugout/connections/dbconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'bugout/model/accounts-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null)
{
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action)
{
  case 'login':
    include $_SERVER['DOCUMENT_ROOT'].'/bugout/view/login.php';
    break;

  case 'register':
    //filter and store the data
    $userfname = filter_input(INPUT_POST, 'userfname');
    $userlname = filter_input(INPUT_POST, 'userlname');
    $useremail = filter_input(INPUT_POST, 'useremail');
    $userpassword = filter_input(INPUT_POST, 'userpassword');

    //check for missing data
    if (empty($userfname) || empty($userlname) || empty($useremail) || empty($userpassword))
    {
      $message = "<p>Please provide information for all fields</p>";
      include $_SERVER['DOCUMENT_ROOT'].'/bugout/view/register.php';
      exit;
    }

    $outcome = register ($userfname, $userlname, $useremail, $userpassword);

    if ($outcome == 1)
    {
      $message = "<h3>Thank you for registering $userfname. Please login to continue.</h3>";
      include $_SERVER['DOCUMENT_ROOT'].'/bugout/view/login.php';
      exit;
    }
    else
    {
      $message = "<h3>Sorry $userfname, the registration failed. Please try again.</p>";
      include $_SERVER['DOCUMENT_ROOT'].'/bugout/view/regester.php';
      exit;
    }

  default:
    include $_SERVER['DOCUMENT_ROOT'].'/bugout/index.php';
    break;
}
?>