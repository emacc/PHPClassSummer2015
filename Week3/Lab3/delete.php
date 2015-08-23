<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <title>Delete Corporation</title>
    </head>
    <body><center>
        <?php
            
        include_once './dbconnect.php';
        
        $id = filter_input(INPUT_GET, 'id');
        
        $db = dbconnect();
           
        $stmt = $db->prepare("DELETE FROM corps WHERE id = :id");
           
        $binds = array(
             ":id" => $id
        );
           
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }         
        
        ?>
        
        <h1> Record <?php echo $id; ?>  
            <?php if ( !$isDeleted ): ?>Not<?php endif; ?> 
            Deleted
        </h1>
        <br/>
       <a href ="view.php">Go Back</a>
    </center>
    </body>
</html>
