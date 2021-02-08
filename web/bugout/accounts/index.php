<?php
//Accounts controller

require_once '../connections/dbconnect.php';

//filter and store the data
$userfname = filter_input(INPUT_POST, 'userfname');
$userlname = filter_input(INPUT_POST, 'userlname');
$useremail = filter_input(INPUT_POST, 'useremail');
$userpassword = filter_input(INPUT_POST, 'userpassword');

//check for missing data
if (empty($userfname) || empty($userlname) || empty($useremail) || empty($userpassword))
{
  $message = "<p>Please provide information for all fields</p>";
  include 'register.php';
  exit;
}

$outcome = register ($userfname, $userlname, $useremail, $userpassword);

if ($outcome == 1)
{
  $message = "<h3>Thank you for registering $userfname. Please login to continue.</h3>";
  include '../login.php';
  exit;
}
else
{
  $message = "<h3>Sorry $userfname, the registration failed. Please try again.</p>";
  include '../regester.php';
  exit;
}
?>