<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body><center>
        <?php
            
        include_once './dbconnect.php';
        
        $corp = filter_input(INPUT_GET, 'corp');
        
        $db = dbconnect();
           
        $stmt = $db->prepare("DELETE FROM corps WHERE corp = :corp");
           
        $binds = array(
             ":corp" => $corp
        );
           
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }         
        
        ?>
        
        <h1> Record <?php echo $corp; ?>  
            <?php if ( !$isDeleted ): ?>Not<?php endif; ?> 
            Deleted
        </h1>
        <br/>
       <a href ="view.php">Go Back</a>
    </center>
    </body>
</html>
