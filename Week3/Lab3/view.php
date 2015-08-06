<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="update2.php?id=2">update</a>
        <?php
        /* Connect to DB and include functions */
            include './dbconnect.php';
            include './functions.php';
        
        /* DB variable set to function */
            $db = dbconnect();
            
        /* Select statement for view */    
            $stmt = $db->prepare("SELECT corp FROM corps");
            $results = array();            
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchALL(PDO::FETCH_ASSOC);                
            }
            
        ?>
        
        <?php/* Begins table with headers */?>
        <table>
            <thead>
                <tr>
                    <th><h1>Corporation</h1></th>
                </tr>
            </thead>
        <?php foreach($results as $row): ?>
            <tr>
               <?php /* Displays database info */?>
                <td><ul><li><?php echo $row['corp']; ?></li></ul></td>
            </tr>
        <?php endforeach; ?>
        </table>
      
        <form action="update.php"method="get">
               <input type="submit" value="Update"/>
        </form>
        
    </body>
</html>