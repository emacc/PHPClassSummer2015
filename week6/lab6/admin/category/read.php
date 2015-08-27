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
                    <th>corp</th>
                    <th>incorp_dt</th>
                    <th>email</th>
                    <th>zipcode</th>
                    <th>owner</th>
                    <th>phone</th>
                </tr>
            </thead>
        <?php foreach($results as $row): ?>
            <tr>
               <?php /* Displays database info */?>
                <td><?php echo $row['category_id']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo date("m/d/Y",strtotime($row['incorp_dt'])); ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['zipcode']; ?></td>
                <td><?php echo $row['owner']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <!--<td align="center"><a class="col-lg-12" href="delete.php?corp=<?php echo $row['corp']; ?>">Delete</a></td>
                <td align="center"><a class="col-lg-12" href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>-->
            </tr>
        <?php endforeach; ?>
        </table>
        <br/>
        <a href ="view.php">Go Back</a>

    </center>
</body>
</html>