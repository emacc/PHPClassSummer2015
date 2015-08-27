<?php

//categories
//category_id
    //category
function createCategory($value) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO categories SET category = :category");

    $binds = array(
        ":category" => $value
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}

function getAllCategories() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM categories");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

function isValidCategory($value) {
    if ( empty($value) ) {
        return false;
    }
    
    if ( preg_match("/^[a-zA-Z]+$/", $value) == false ) {
        return false;
    }
    
    return true;
}

function getCategoryById() {
    $db = dbconnect();
    
    $category_id = filter_input(INPUT_GET, 'category_id');
    
    $stmt = $db->prepare("SELECT * FROM categories WHERE category_id = :category_id");
        $binds = array(
            ":category_id" => $category_id
        );
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
     
    return $results;
    
}