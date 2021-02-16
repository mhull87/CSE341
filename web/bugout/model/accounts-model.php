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
    $stmt->bindValue(':userpassword', password_hash($userpassword, PASSWORD_DEFAULT), PDO::PARAM_STR);

    $stmt->execute();

    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return $rowsChanged;
  }

function passcheck($userpassword)
  {
    //at least 5 characters and 1 number
    $pattern = '/^(?=\D*\d)[a-zA-Z0-9]{1,5}$/';

    return preg_match($pattern, $userpassword);
  }

function login($useremail)
  {
    $db = get_db();
    
    $query = 'SELECT useremail, userpassword FROM bugoutuser
              WHERE useremail = :useremail';

    $stmt = $db->prepare($query);

    $stmt->bindValue(':useremail', $useremail);

    $stmt->execute();

    $user = $stmt->rowCount();

    $stmt->closeCursor();

    return $user;
  }
?>