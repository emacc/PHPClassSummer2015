<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

/**
 * A method to check if a Get request has been made.
 *    
 * @return boolean
 */
function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}

function getSiteName ($site_id) {
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM sites WHERE site_id = :site_id");
    
            $siteName = '';
             $binds = array(
                ":site_id" => $site_id
                );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $site = $stmt->fetch(PDO::FETCH_ASSOC);
                $siteName = $site['site'];
            }
            
            return $siteName;
}
