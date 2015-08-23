<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Table View</title> 
        
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
        
           /*  Includes database connection function,
            *  various constructed functions located in dbData.php,
            *  form page that uses "ORDER BY" sql statement,
            *  and form page that uses "WHERE LIKE" sql query to search for data
            */ 
           include_once './functions/dbconnect.php';
           include_once './functions/dbData.php';
           include_once './functions/util.php';
           include './includes/sortForm.php';
           include './includes/searchForm.php';
           
           // Connect to database
           $db = dbconnect();
           
           // Results is set to function
           // Function returns all data from the "corps" table
           $results = getAllCorpsData();
           
           // action variable gets input value 
           $action = filter_input(INPUT_GET, 'action');
            
           // if action is sort, returns data from order function using results variable
            if ($action === 'sort') {
               $results = orderCorps();
            }
            
           
           // if action is search, returns data from search function using results variable
             if ( $action === 'search' ) {
                 
                 /*  Gets search form name from URL
                  *  Gets search value from ID in URL
                  *  Sets results = results of the search function
                  */
                 $column = filter_input(INPUT_GET, 'searchColumn');
                 $search = filter_input(INPUT_GET, 'searchQuery');
                 $results = searchCorps($column, $search);
                }
        ?>
             <img id="img1" src="images/002.png"/>
             
        <!-- creates table header using sql table column names -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>corp</th>
                    <th>incorp_dt</th>
                    <th>email</th>
                    <th>zipcode</th>
                    <th>owner</th>
                    <th>phone</th>
                </tr>
            </thead>
            
            <!-- table data returns requested data from corps table -->
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
