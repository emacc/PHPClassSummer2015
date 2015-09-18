<?php
function getAllGroups() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address_groups");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

function createAddress($user_id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday, $image ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET user_id = :user_id, address_group_id = :address_group_id, fullname = :fullname, email = :email, address = :address, phone = :phone, website = :website, birthday = :birthday, image = :image ");

    $binds = array(
        ":user_id" => $user_id,
        ":address_group_id" => $address_group_id,
        ":fullname" => $fullname,
        ":email" => $email,
        ":address" => $address,
        ":phone" => $phone,
        ":website" => $website,
        ":birthday" => $birthday,
        ":image" => $image
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    
    return false;
}

function getAddressByUser ($user_id) {
    
     $db = dbconnect();
     
    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id");
     
     $binds = array(
                ":user_id" => $user_id
                );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
    
    return $results;
    
}

function getAddressByID ($address_id, $user_id) {
    
     $db = dbconnect();
     
    $stmt = $db->prepare("SELECT * FROM address JOIN address_groups on address.address_group_id = address_groups.address_group_id WHERE address_id = :address_id and user_id = :user_id");
     
     $binds = array(
                ":address_id" => $address_id,
                ":user_id" => $user_id
                );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
    
    return $results;
    
}
               
         