<?php

function getAllCorpsData(){
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM corps");

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}

/*
 * $stmt = $db->prepare("SELECT * FROM test ORDER BY $column $order");
 */
function searchCorps($column, $search){
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search");

    $search = '%'.$search.'%';
    $binds = array(
        ":search" => $search
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

/* Order View page based on selection of column name */
function orderByColumn() {
        
    include_once './functions/dbconnect.php';

    $db = dbconnect();
   
    $getColumn = array(   "id" => 'ID',
                          "corp" => 'Corporation',
                          "incorp_dt" => 'Incorporation Date',
                          "email" => 'Email',
                          "zipcode" => 'Zip Code',
                          "owner" => 'Owner',
                          "phone" => 'Phone'
                        );
    
    
    $stmt = $db->prepare("SELECT * FROM corps ORDER BY $getColumn");
    
    $results = array();
    
    if ($stmt->execute() && $stmt->rowCount() > 0) {
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
    
    return $results;
}
          
      