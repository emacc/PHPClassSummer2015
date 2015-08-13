<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
        <?php
        
           include_once './functions/dbconnect.php';
           include_once './functions/dbData.php';
           include './includes/form1.php';
            
          /* $results = getAllTestData(); 
           
           $column = 'datatwo';
           $search = 'test'; */
           
           $results = getAllCorpsData();
            
        ?>
        
        
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporation</th>
                    <th>Incorporation Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo date("m/d/Y",strtotime($row['incorp_dt'])); ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                     </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
           
    </body>
</html>