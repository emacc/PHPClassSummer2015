<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <title>Home</title>
    </head>
    <body><center>
        <div id="wrapper">
        <?php
        /* Connect to DB and include functions */
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/products-functions.php';

        $products = getAllProducts();
        
        ?>

        <?php /* Begins table with headers */ ?>
        <table border="1">
            <thead>
                <tr>
                    <th><h1>Product</h1></th>
                    <th colspan="5"><a href="create.php">Click Here to <br/>Add A New Product</a>
                </tr>
            </thead>
       <tbody>
            <?php foreach ($products as $row): ?>
                <tr>
                    <?php /* Displays database info */ ?>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                    <td><a href="read.php?product_id=<?php echo $row['product_id']; ?>">Read</a></td>
                    <td><a href="delete.php?product_id=<?php echo $row['product_id']; ?>">Delete</a></td>
                    <td><a href="update.php?product_id=<?php echo $row['product_id']; ?>">Update</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        </center>
   </body>
</html>