<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Category</title>
    </head>
    <body><center>
        <?php
        /* Connect to DB and include functions */
       include_once '../../functions/dbconnect.php';
       include_once '../../functions/util.php';
        
        /* POST and GET statements share database connect function */
        $db = dbconnect();
        
        /* Sets a default for variables */
        $category_id = '';
        $category = '';

        if (isPostRequest() ) {
            
            $category_id = filter_input(INPUT_POST, 'category_id');
            $category = filter_input(INPUT_POST, 'category');
            
            $stmt = $db->prepare("UPDATE categories SET category = :category WHERE category_id = :category_id");
            
            $binds = array(
                ":category_id" => $category_id,
                ":category" => $category
            );
            
            $message = 'Update Failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $message = 'Update Completed';
            }
        }
        
        else {
            $category_id = filter_input(INPUT_GET, 'category_id');
        }

        /* statment selects from database */
        $stmt = $db->prepare("SELECT * FROM categories WHERE category_id = :category_id");

        /* binds results into array */
        $binds = array(
            ":category_id" => $category_id
        );

        /* result = array */
        $results = array();

        /* test if statement executes */
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $category = $results['category'];
        }
        ?>

        <p><h2>
            <?php if (isset ($message)) {
                echo $message;
            } ?>
        </h2></p>
        
        <form method="post" action="#">
        Category <input type="text" name="category" value="<?php echo $category ?>"/></h4>
        <br />
        <input type="hidden" name="category_id" value="<?php echo $category_id ?>" />
        <input type="submit" value="Submit" />
        </form>
        <br/><br/>
        <a href ="index.php">Go Back</a> <a href="../../admin/index.php">Admin Home</a>

    </center>
</body>
</html>