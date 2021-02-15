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
  case 'register':
    $username = filter_input(INPUT_POST, 'username');
    $pass = filter_input(INPUT_POST, 'pass');

    //check for missing data
    if (empty($username) || empty($pass))
    {
      $message = "<p>Please provide information for all fields</p>";
      include 'index.php';
      exit;
    }

    $outcome = register($username, $pass);
    if ($outcome === 1)
    {
      $message = "<h3>Thank you for registering $username. Please login to continue.</h3>";
    }
    else
    {
      $message = "<h3>Sorry $username, the registration failed. Please try again.</p>";
    }

    header('Location: index.php');
    die();
    break;

  case 'login':
    //filter and store the data
    $_SESSION['username'] = $username = filter_input(INPUT_POST, 'username');
    $pass = filter_input(INPUT_POST, 'pass');

    //check for missing data
    if (empty($username) || empty($pass))
    {
      $message = "<p>Please provide information for all fields</p>";
      include 'index.php';
      exit;
    }

    $hash = login($username);

    if (password_verify($pass, $hash))
    {
      header('Location: index.php');
      echo 'Successful Sign In';
      echo $_SESSION;
    }
    else
    {
      $message = "<h3>Sorry $username, the login failed. Please try again.</p>";
    }

  default:
    include '../index.php';
    break;
}
?>