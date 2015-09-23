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
         
function deleteAddress ($address_id, $user_id) {
    $db = dbconnect();
    
    $stmt = $db->prepare("DELETE FROM address WHERE address_id = :address_id AND user_id = :user_id");
    
    $binds = array(
             ":address_id" => $address_id,
             ":user_id" => $user_id
        );
           
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        } 
        return false;
}

//function getGroupByID ($address_id) {
//    
//     $db = dbconnect();
//     
//    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id");
//     
//     $binds = array(
//                ":user_id" => $user_id
//                );
//    
//    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
//        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    } else {
//        return false;
//    }
//    
//    return $results;
//    
//}

function getContactByGroupId($address_group_id, $user_id) {
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM address WHERE address_group_id = :address_group_id AND user_id = :user_id");
        $binds = array(
            ":address_group_id" => $address_group_id,
            ":user_id" => $user_id
        );
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
     
    return $results;
    
}

function updateNoImg ( $address_group_id, $address_id, $user_id, $fullname, $email, $address, $phone, $website, $image ) {
    
    $db = dbconnect();
    
    $stmt = $db->prepare("UPDATE address SET address_group_id = :address_group_id, fullname = :fullname, email = :email, address = :address, phone = :phone, website = :website, image = :image WHERE address_id = :address_id AND user_id = :user_id");
            
    $binds = array(
        ":address_group_id" => $address_group_id,
        ":address_id" => $address_id,
        ":user_id" => $user_id,
        ":fullname" => $fullname,
        ":email" => $email,
        ":address" => $address,
        ":phone" => $phone,
        ":website" => $website,
        ":image" => $image
    );

    $message = 'Update Failed';
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
    $message = 'Update Completed';
    }
}

function getAddress ($address_id, $user_id) {
    
     $db = dbconnect();
     
    $stmt = $db->prepare("SELECT * FROM address WHERE address_id = :address_id and user_id = :user_id");
     
     $binds = array(
                ":address_id" => $address_id,
                ":user_id" => $user_id
                );
     $results = array();

        /* test if statement executes */
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        }
    return false;
}

function isEmptyField($value) {
    if ( empty($value) ) {
        return true;
    }
    return false;
}

function columnsDropDown() {
      $dropdown = array("fullname" => 'Full Name',
              "email" => 'Email',
              "address" => 'Address',
              "phone" => 'Phone'
        );
       return $dropdown;
}

function orderContacts($orderByColumn, $sortOrder, $user_id){
    
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id ORDER BY $orderByColumn $sortOrder");

    $binds = array(
                ":user_id" => $user_id
                );
    
    $results = array();
    $orderMessage = "Re-Order Failed!";
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $orderMessage = "Re-Order Completed Successfully!";
      }
    ?>
    <p>
        <?php echo $orderMessage; ?></p>
    <?php
        return $results;
    
}

function searchContacts($column, $search, $user_id){
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id AND $column LIKE :search");

    $search = '%'.$search.'%';
    $binds = array(
        ":search" => $search,
        ":user_id" => $user_id
    );
    $results = array();
    $searchMessage = "Search failed to return results.";
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numRows = count($results);
        $searchMessage = "Search returned $numRows results!";
    }
   
    ?>
    <p>
        <?php echo $searchMessage; ?></p>
    <?php
    return $results;
   
}