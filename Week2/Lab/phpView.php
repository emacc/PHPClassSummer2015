<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /* Connect to DB and include functions */
            include './dbconnect1.php';
            include './functions.php';
        
        /* DB variable set to function */
            $db = dbconnect();
            
        /* Select statement for view */    
            $stmt = $db->prepare("SELECT * FROM corps");
            $results = array();            
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchALL(PDO::FETCH_ASSOC);                
            }
            
        ?>
        
        <?php/* Begins table with headers */?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Height</th>
                </tr>
            </thead>
        <?php foreach($results as $row): ?>
            <tr>
               <?php /* Displays database info */?>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['firstName']; ?></td>
                <td><?php echo $row['lastName']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td><?php echo $row['height']; ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
       
    </body>
</html>