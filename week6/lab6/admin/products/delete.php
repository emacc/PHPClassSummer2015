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
        
        $product_id = filter_input(INPUT_GET, 'product_id');
        
        $db = dbconnect();
           
        $stmt = $db->prepare("DELETE FROM products WHERE product_id = :product_id");
           
        $binds = array(
             ":product_id" => $product_id
        );
           
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }         
        
        ?>
        
        <h1> Record <?php echo $product_id; ?>  
            <?php if ( !$isDeleted ): ?>Not<?php endif; ?> 
            Deleted
        </h1>
        <br/>
       <a href ="index.php">Go Back</a>
    </center>
    </body>
</html>
