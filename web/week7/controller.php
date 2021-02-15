<?php
//Accounts controller

require_once 'connect.php';
require_once 'model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null)
{
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action)
{
  case 'login':
    $outcome = login($username, $pass);

    if ($outcome === 1)
    {
      $message = "<h3>Thank you for logging in $username.</h3>";
      include 'index.php';
      exit;
    }
    else
    {
      $message = "<h3>Sorry $username, the login failed. Please try again.</p>";
      include 'index.php';
      exit;
    }

    include 'index.php';
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
      include '../view/register.php';
      exit;
    }

    $outcome = register($userfname, $userlname, $useremail, $userpassword);

    if ($outcome == 1)
    {
      $message = "<h3>Thank you for registering $userfname. Please login to continue.</h3>";
      include '../view/login.php';
      exit;
    }
    else
    {
      $message = "<h3>Sorry $userfname, the registration failed. Please try again.</p>";
      include '../view/regester.php';
      exit;
    }

  default:
    include '../index.php';
    break;
}
?>