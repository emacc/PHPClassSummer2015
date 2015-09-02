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
        include_once '../../functions/category-functions.php';

        $categories = getAllCategories();
        
        ?>

        <?php /* Begins table with headers */ ?>
        <table border="1">
            <thead>
                <tr>
                    <th><h1>Category</h1></th>
                    <th colspan="3"><a href="create.php">Click Here to <br/>Add A New Category</a>
                </tr>
            </thead>
       <tbody>
            <?php foreach ($categories as $row): ?>
                <tr>
                    <?php /* Displays database info */ ?>
                    <td><?php echo $row['category']; ?></td>
                    <td><a href="read.php?category_id=<?php echo $row['category_id']; ?>">Read</a></td>
                    <td><a href="delete.php?category_id=<?php echo $row['category_id']; ?>">Delete</a></td>
                    <td><a href="update.php?category_id=<?php echo $row['category_id']; ?>">Update</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        </center>
   </body>
</html>