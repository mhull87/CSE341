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

function login($username, $pass, $badlogin)
{
  $db = get_db();

  $query = 'SELECT pass FROM users
            WHERE username = :username';

  $stmt = $db->prepare($query);

  $stmt->bindValue(':username', $username, PDO::PARAM_STR);

  $result = $stmt->execute();

  $badlogin = false;

  if ($result)
  {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $hash = $row['password'];

    if (password_verify($pass, $hash))
    {
      $_SESSION['username'] = $username;
      header('Location: index.php');
      die();
    }
    else
    {
      $badlogin = true;
    }
  }
  else
  {
    $badlogin = true;
  }

  $stmt->closeCursor();

  return $badlogin;
}
?>