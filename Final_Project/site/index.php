<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            require_once '../includes/session-start.req-inc.php';
            
            include_once '../functions/dbconnect.php';
            include_once '../functions/user_functions.php';
            include_once '../functions/util.php';
            
            include_once '../includes/loginform.html.php';
            
            if ( isPostRequest() ) {
                
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'password');
                
                
               
                
                $db = dbconnect();
                
                if ( isValidUser($email, $password) ) {
                    $user_id = getCurrentUser($email, $password);
                    $_SESSION['user_id'] = $user_id; 
                    
                   
                } else {
                    $errors[] = 'Email and Password combination does not exist. Please try again';
                }
            }
            
            if ( isset($_SESSION['user_id']) &&  intval($_SESSION['user_id']) > 0 ) {
                
                header("Location: ../user/index.php");
                exit();
            }
            
           
             include '../includes/errors.php'; ?>
        
    </body>
</html>
