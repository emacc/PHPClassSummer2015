<?php

function createUser($email, $password) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = now()");

    $binds = array(
        ":email" => $email,
        ":password" => sha1($password)
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    
    return false;
}

function isValidUser( $email, $password ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    //$pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => sha1($password)
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
}

function getCurrentUser($email, $password) {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    //$pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => sha1($password)
    );

     if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $user_id = $user['user_id'];
                return $user_id;
    }
     return 0;    
}

function UserExist( $email ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    //$pass = sha1($pass);
    $binds = array(
        ":email" => $email
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return false;
    }
   
    return true;
}
