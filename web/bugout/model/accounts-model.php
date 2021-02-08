<?php
function register($userfname, $userlname, $useremail, $userpassword)
{
  $query = 'INSERT INTO users (userfname, userlname, useremail, userpassword)
            VALUES (:userfname, :userlname, :useremail, :userpassword)';

  $db = get_db();

  $stmt = $db->prepare($query);

  $stmt->bindValue(':userfname', $userfname, PDO::PARAM_STR);
  $stmt->bindValue(':userlname', $userlname, PDO::PARAM_STR);
  $stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);
  $stmt->bindValue(':userpassword', $userpassword, PDO::PARAM_STR);

  $stmt->execute();
  $stmt->closeCursor();
}
?>