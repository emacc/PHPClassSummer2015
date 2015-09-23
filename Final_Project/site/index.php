<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- Style Sheet -->
        <link rel="stylesheet" type="text/css" href="../css/create_account_home_login_css.css">
        
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
                
        <title>Login</title>
    </head>
    <body>
        <div id="wrapper">
        <?php
        
            require_once '../includes/session-start.req-inc.php';
            include_once '../functions/dbconnect.php';
            include_once '../functions/user_functions.php';
            include_once '../functions/util.php';
            
            $email = "";
            
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
            ?>
            <center>
                <div id="test">
                <img id="loginimg" src="../images/logo3.png"/>
                <div id="loginbox">
                <?php include_once '../includes/loginform.html.php'; ?>
                <?php if (isset($errors)) : ?>
                <h3 id="loginh3">Login Failed:</h3>
                <div id="loginError">
                <?php include '../includes/errors.php'; endif; ?>
                </div>
                </div>
                </div>
            </center>
        </div>
    </center>
        </div>
    </body>
</html>
