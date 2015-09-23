<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <title>Delete Corporation</title>
    </head>
    <body><center>
        <?php
            
         include_once '../../functions/dbconnect.php';
        require_once '../../includes/session-start.req-inc.php';
        require_once '../../includes/access-required.html.php';
         
        $category_id = filter_input(INPUT_GET, 'category_id');
        
        $db = dbconnect();
           
        $stmt = $db->prepare("DELETE FROM categories WHERE category_id = :category_id");
           
        $binds = array(
             ":category_id" => $category_id
        );
           
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }         
        
        ?>
        
        <h1> Record <?php echo $category_id; ?>  
            <?php if ( !$isDeleted ): ?>Not<?php endif; ?> 
            Deleted
        </h1>
        <br/>
       <a href ="index.php">Go Back</a> <a href="../../admin/index.php">Admin Home</a>
    </center>
    </body>
</html>
