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
        $product_id = '';
        $product = '';

        if (isPostRequest() ) {
            
            $product_id = filter_input(INPUT_POST, 'product_id');
            $product = filter_input(INPUT_POST, 'product');
            
            $stmt = $db->prepare("UPDATE products SET product = :product WHERE product_id = :product_id");
            
            $binds = array(
                ":product_id" => $product_id,
                ":product" => $product
            );
            
            $message = 'Update Failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $message = 'Update Completed';
            }
        }
        
        else {
            $product_id = filter_input(INPUT_GET, 'product_id');
        }

        /* statment selects from database */
        $stmt = $db->prepare("SELECT * FROM products WHERE product_id = :product_id");

        /* binds results into array */
        $binds = array(
            ":product_id" => $product_id
        );

        /* result = array */
        $results = array();

        /* test if statement executes */
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $product = $results['product'];
        }
        ?>

        <p>
            <?php if (isset ($message)) {
                echo $message;
            } ?>
        </p>
        
        <form method="post" action="#">
        Product <input type="text" name="product" value="<?php echo $product ?>"/></h4>
        <br />
        <input type="hidden" name="product_id" value="<?php echo $product_id ?>" />
        <input type="submit" value="Submit" />
        </form>
        <br/><br/>
        <a href ="index.php">Go Back</a>

    </center>
</body>
</html>