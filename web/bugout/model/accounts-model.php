<?php
//This is the accounts model

function register($userfname, $userlname, $useremail, $userpassword)
  {
    $db = get_db();
    
    $query = "INSERT INTO bugoutuser (userfname, userlname, useremail, userpassword)
              VALUES (:userfname, :userlname, :useremail, :userpassword)";

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

function getlastreg()
{
  $db = get_db();

  $query = "SELECT user_id FROM bugoutuser
            WHERE CTID = (SELECT MAX(CTID) FROM bugoutuser)";
  
  $stmt = $db->prepare($query);

  $stmt->execute();

  $lastreg = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt->closeCursor();

  return $lastreg;
}

function createusertables($user_id)
{
  $db = get_db();

  $query = "CREATE TABLE bugout_bag_`".$user_id."` (
    bag_id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES bugoutuser (user_id),
    item_id INT NOT NULL REFERENCES items (item_id),
    packed VARCHAR(3) NOT NULL,
    quantity INT NOT NULL
  )"
  
;

$stmt = $db->prepare($query);

$stmt->execute();

$stmt->closeCursor();
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
    
    $query = 'SELECT user_id, useremail, userpassword FROM bugoutuser
              WHERE useremail = :useremail';

    $stmt = $db->prepare($query);

    $stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt->closeCursor();

    return $user;
  }
?>