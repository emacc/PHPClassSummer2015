<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title> 
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
   
    <body>
         <div class="wrapper">
        <?php
        
            
        
           include_once './functions/dbconnect.php';
           include_once './functions/dbData.php';
           include_once './functions/util.php';
           include './includes/sortForm.php';
           include './includes/searchForm.php';
           
           $db = dbconnect();
           
           $results = getAllCorpsData();
           
           $action = filter_input(INPUT_GET, 'action');
            
           if ($action === 'sort') {
               
               $results = orderCorps();
            }
            
           
           
             if ( $action === 'search' ) {
                 
                 $column = filter_input(INPUT_GET, 'searchColumn');
                 $search = filter_input(INPUT_GET, 'searchQuery');
                 $results = searchCorps($column, $search);
                }
        ?>
             <img id="img1" src="002.png"/>
        <table class="table table-hover">
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
        </div>   
    </body>
    
</html>
