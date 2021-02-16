<?php 
    function registerUser($username, $userPassword){
        $db = databaseConnect();
        $sql = 'INSERT INTO users ("username", "userPassword") VALUES (:username, :userPassword)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':userPassword', $userPassword, PDO::PARAM_STR);
        $stmt->execute();
        $rowsChanged = $stmt->rowCount();
        $stmt->closeCursor();
        return $rowsChanged;
    }
    function getUser($username){
        $db = databaseConnect();
        $sql = 'SELECT * FROM users WHERE "username" = :username';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $userData;
    }
