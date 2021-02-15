<?php
//This is the accounts model

function register($username, $pass)
{
  $db = get_db();
  
  $query = 'INSERT INTO users (username, pass)
            VALUES (:username, :pass)';

  $stmt = $db->prepare($query);

  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->bindValue(':pass', password_hash($pass, PASSWORD_DEFAULT), PDO::PARAM_STR);

  $stmt->execute();

  $rowsChanged = $stmt->rowCount();

  $stmt->closeCursor();

  return $rowsChanged;
}

function login($username)
{
  $db = get_db();

  $query = 'SELECT pass FROM users
            WHERE username = :username';

  $stmt = $db->prepare($query);

  $stmt->bindValue(':username', $username, PDO::PARAM_STR);

  $stmt->execute();

  $hash =  $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt->closeCursor();

  return $hash;
}
?>