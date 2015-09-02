<?php
/*
 * products
 * product_id
 * category_id
 * product
 * price
 * image
 */


function createProduct($category_id, $product, $price, $image ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO products SET category_id = :category_id, product = :product, price = :price, image = :image ");

    $binds = array(
        ":category_id" => $category_id,
        ":product" => $product,
        ":price" => $price,
        ":image" => $image
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    
    return false;
}

function isValidProduct($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;    
}
function isValidPrice($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;
}

function getAllProducts() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

function getProductById() {
    $db = dbconnect();
    
    $product_id = filter_input(INPUT_GET, 'product_id');
    
    $stmt = $db->prepare("SELECT * FROM products WHERE product_id = :product_id");
        $binds = array(
            ":product_id" => $product_id
        );
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
     
    return $results;
    
}