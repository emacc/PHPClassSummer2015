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
    $searchMessage = "Search failed to return results.";
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numRows = count($results);
        $searchMessage = "Search returned $numRows results!";
    }
   
    echo $searchMessage;
    return $results;
   
}

function columnsDropDown() {
       $getColumn = array("id" => 'ID',
              "corp" => 'Corporation',
              "incorp_dt" => 'Incorporation Date',
              "email" => 'Email',
              "zipcode" => 'Zip Code',
              "owner" => 'Owner',
              "phone" => 'Phone',
        );
}