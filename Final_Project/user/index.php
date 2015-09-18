<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User - Home</title>
    </head>
    <body>
        <?php
        require_once '../includes/session-start.req-inc.php';
        require_once '../includes/access-required.html.php';
        
        include_once '../functions/dbconnect.php';
        include_once '../functions/address_functions.php';
        
        //$user_id = filter_input(INPUT_GET, 'user_id');
        
        $user_id = $_SESSION['user_id'];
        
        $contacts = getAddressByUser($user_id);
        
       // var_dump($user_id);
        ?>
        <nav>
            <a href="index.php">Home</a>
            <a href="add_address.php">Add Contact</a>
        </nav>
            <h2>Your Address Book - Home</h2>
            
            
            <?php if ($contacts) {
                $address_id = filter_input(INPUT_GET, 'address_id');
                include_once '../includes/view.php';
            }
            
            else { 
                $errors[] = 'You have no contacts to display - Add some!'; 
            }
            ?>
            <p><?php include_once '../includes/errors.php'; ?></p>
            <br/>
            <form action='../sessiondelete.php' method="post">
            <input type="submit" name="action" value="Log Out">
            </form>
    </body>
</html>
