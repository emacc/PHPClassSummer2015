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
   
    ?>
    <p id="searchMsg">
        <?php echo $searchMessage; ?></p>
    <?php
    return $results;
   
}

function orderCorps(){
    $db = dbconnect();
    //if (!empty($orderByColumn))
    {
        $orderByColumn = filter_input(INPUT_GET, 'orderByColumn');
        $sortOrder = filter_input(INPUT_GET, 'sortOrder');
        $stmt = $db->prepare("SELECT * FROM corps ORDER BY $orderByColumn $sortOrder");

        $results = array();
        $orderMessage = "Re-Order Failed!";
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $orderMessage = "Re-Order Completed Successfully!";
          }
    ?>
    <p id="sortmsg">
        <?php echo $orderMessage; ?></p>
    <?php
        return $results;
    }
}


function columnsDropDown() {
      $dropdown = array("id" => 'ID',
              "corp" => 'Corporation',
              "incorp_dt" => 'Incorporation Date',
              "email" => 'Email',
              "zipcode" => 'Zip Code',
              "owner" => 'Owner',
              "phone" => 'Phone',
        );
       return $dropdown;
}