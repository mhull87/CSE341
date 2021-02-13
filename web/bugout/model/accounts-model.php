<?php
//This is the accounts model

function register($userfname, $userlname, $useremail, $userpassword)
{
  $db = get_db();
  
  $query = 'INSERT INTO bugoutuser (userfname, userlname, useremail, userpassword)
            VALUES (:userfname, :userlname, :useremail, :userpassword)';

  $stmt = $db->prepare($query);

  $stmt->bindValue(':userfname', $userfname, PDO::PARAM_STR);
  $stmt->bindValue(':userlname', $userlname, PDO::PARAM_STR);
  $stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);
  $stmt->bindValue(':userpassword', $userpassword, PDO::PARAM_STR);

  $stmt->execute();

  $rowsChanged = $stmt->rowCount();

  $stmt->closeCursor();

  return $rowsChanged;
}

function login($useremail, $userpassword)
{
  $db = get_db();
  
  $query = '';

  $stmt = $db->prepare($query);

  $stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);
  $stmt->bindValue(':userpassword', $userpassword, PDO::PARAM_STR);

  $stmt->execute();

  $rowsChanged = $stmt->rowCount();

  $stmt->closeCursor();

  return $rowsChanged;
}
?>