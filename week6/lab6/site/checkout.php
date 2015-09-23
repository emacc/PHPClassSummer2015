<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

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
            
            $action = filter_input(INPUT_POST, 'action');
            
            if ($action == 'Empty cart')
            {
                emptyCart();
            }
                        
            startCart(); 
            
            $total = 0;
            
            $checkoutProducts = array();
            
            $items = getCart();
            
            foreach ($items as $id) {
                $checkoutProducts[] = getProduct($id);
            }
            
            include '../includes/checkout.html.php';
            
            
        ?>
        
         <form action="#" method="post">
        <a href="index.php">Go Back</a>
        <input type="submit" name="action" value="Empty cart">
        </form>
    </center>
    </body>
</html>
