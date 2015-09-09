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
        include_once '../../functions/products-functions.php';
        
        $db = dbconnect();
        
        $product_id = filter_input(INPUT_GET, 'product_id');
               
        $results = getProductById();
        ?>

         <table class="table-hover" border="2">
            <thead>
                <tr>
                    <th>product_id</th>
                    <th>category_id</th>
                    <th>product</th>
                    <th>price</th>
                    <th>image</th>
                   
                </tr>
            </thead>
        <?php foreach($results as $row): ?>
            <tr>
               <?php /* Displays database info */?>
                <td><?php echo $row['product_id']; ?></td>
                <td><?php echo $row['category_id']; ?></td>
                <td><?php echo $row['product']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php if ( empty($row['image']) ) : ?>
                    No Image
                <?php else: ?><img src="../../images/<?php echo $row['image']; ?>" width="100" height="100" /></td>
               <?php endif; ?>
                <td><a href="delete.php?product_id=<?php echo $row['product_id']; ?>">Delete</a></td>
                <td><a href="update.php?product_id=<?php echo $row['product_id']; ?>">Update</a></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <br/>
        <a href ="index.php">Go Back</a> <a href="../../admin/index.php">Admin Home</a>

    </center>
</body>
</html>