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
       include_once '../../functions/products-functions.php';
        
        /* POST and GET statements share database connect function */
        $db = dbconnect();
        
        /* Sets a default for variables */
        $product_id = '';
        $product = '';
        $price = '';
        $imageUpload = true;
        
        if (isPostRequest() ) {
            
            $product_id = filter_input(INPUT_POST, 'product_id');
            $product = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            $image = uploadProductImage();
            
            if ( empty ($image) ) {
                $imageUpload = false;
                
                $stmt = $db->prepare("UPDATE products SET product = :product, price = :price WHERE product_id = :product_id");
                
                $binds = array(
                ":product_id" => $product_id,
                ":product" => $product,
                ":price" => $price
            );
            
            $message = 'Update Failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $message = 'Update Completed';
            }
            }
            
            if ($imageUpload === true)
            {
            $stmt = $db->prepare("UPDATE products SET product = :product, price = :price, image = :image WHERE product_id = :product_id");
            
            $binds = array(
                ":product_id" => $product_id,
                ":product" => $product,
                ":price" => $price,
                ":image" => $image
            );
            
            $message = 'Update Failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $message = 'Update Completed';
            }
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
            $price = $results['price'];
            $image = $results['image'];
        }
        ?>

        <p><h2>
            <?php if (isset ($message)) {
                echo $message;
            } ?>
        </h2>
        </p>
        
        <form method="post" action="#" enctype="multipart/form-data">
        Product <input type="text" name="product" value="<?php echo $product ?>"/></h4><br />
        Price <input type="text" name="price" value="<?php echo $price ?>"/></h4><br />
        <?php if ( empty($image) ) : ?>
                    No Image
                <?php else: ?>
        Current Image:<img src="../../images/<?php echo $image; ?>" width="100" height="100" /></td>
        <?php endif; ?><br/>
        Update Image <input type="file" name="upfile"/></h4><br />
        <input type="hidden" name="product_id" value="<?php echo $product_id ?>" />
        <input type="submit" value="Submit" />
        </form>
        <br/><br/>
        <a href ="index.php">Go Back</a> <a href="../../admin/index.php">Admin Home</a>

    </center>
</body>
</html>