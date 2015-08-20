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
           include_once './functions/util.php';
           include './includes/sortForm.php';
           include './includes/searchForm.php';
           
           $db = dbconnect();
           
           $results = getAllCorpsData();
           
           $action = filter_input(INPUT_GET, 'action');
            
           if (isGetRequest() ) {
                $orderByColumn = filter_input(INPUT_GET, 'orderByColumn');
                $sortOrder = filter_input(INPUT_GET, 'sortOrder');
            
                if (!empty($orderByColumn)){
                  
                    $stmt = $db->prepare("SELECT * FROM corps ORDER BY $orderByColumn $sortOrder");

                    $results = array();
                    if ($stmt->execute() && $stmt->rowCount() > 0) {
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
                }
            }
            
           
           
             if ( $action === 'search' ) {
                 $column = filter_input(INPUT_GET, 'searchColumn');
                 $search = filter_input(INPUT_GET, 'searchQuery');
                 $results = searchCorps($column, $search);
                 
                }
                
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
