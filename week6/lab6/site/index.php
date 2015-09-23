<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
    <center>
        <?php
            require_once '../includes/session-start.req-inc.php';
            require_once '../functions/cart-functions.php';
            require_once '../functions/dbconnect.php';
            require_once '../functions/util.php';
            require_once '../functions/category-functions.php';
            require_once '../functions/products-functions.php';
                        
            startCart();            
            
             
            
            $allCategories = getAllCategories();            
            $allProducts = getAllProducts();
            
            $categorySelected = filter_input(INPUT_GET, 'category_id');
            
            if (NULL != $categorySelected) {
                $allProducts = getProductByCategoryId($categorySelected);
            }
            
            $action = filter_input(INPUT_POST, 'action');
                       
            
            if ( $action === 'buy' ) {
                $productID = filter_input(INPUT_POST, 'product_id');
                addToCart($productID);
                
            }
                         
           
            include_once '../includes/categories.html.php';
            include_once '../includes/products.html.php';
            
            
            
        ?>
        <a href="checkout.php">View your cart</a>
    </center>
    </body>
</html>
