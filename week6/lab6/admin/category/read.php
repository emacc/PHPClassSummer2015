<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Categories</title>
    </head>
    <body><center>
        <?php
        /* Connect to DB and include functions */
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category-functions.php';
        
        $db = dbconnect();
        
        $category_id = filter_input(INPUT_GET, 'category_id');
       
        $results = getCategoryById();
        ?>

         <table class="table-hover" border="2">
            <thead>
                <tr>
                    <th>category_id</th>
                    <th>category</th>
                   
                </tr>
            </thead>
        <?php foreach($results as $row): ?>
            <tr>
               <?php /* Displays database info */?>
                <td><?php echo $row['category_id']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><a href="delete.php?category_id=<?php echo $row['category_id']; ?>">Delete</a></td>
                <td><a href="update.php?category_id=<?php echo $row['category_id']; ?>">Update</a></td>
                </tr>
        <?php endforeach; ?>
        </table>
        <br/>
        <a href ="index.php">Go Back</a> <a href="../../admin/index.php">Admin Home</a>

    </center>
</body>
</html>