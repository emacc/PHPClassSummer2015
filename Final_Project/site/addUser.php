<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- Style Sheet -->
        <link rel="stylesheet" type="text/css" href="../css/create_account_home_login_css.css">
        
         <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        
        <title>Create Account</title>
    </head>
    <body>
        <?php
        
        include_once '../functions/dbconnect.php';
        include_once '../functions/util.php';
        include_once '../functions/user_functions.php';
        
        $email = "";
        //^\({1}[1-9]{1}[0-9]{2}\){1}[1-9]{1}[0-9]{2}-{1}[0-9]{4}
        if ( isPostRequest() ) {
            
            $isValid = true;
            
            
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $confirmPassword = filter_input(INPUT_POST, 'passwordConfirm');
            //$emailOnlyRegex = '/^[a-zA-Z0-9$]+[@]{1}[a-zA-Z]+[\.]{1}[a-zA-Z]{2,3}$/';
            $emailOnlyRegex = '/[a-zA-Z0-9$]+[@]{1}[a-zA-Z]+[\.]{1}[a-zA-Z]{2,3}/';
            
            //^\({1}[1-9]{1}[0-9]{2}\){1}[1-9]{1}[0-9]{2}-{1}[0-9]{4}
            if ( !preg_match($emailOnlyRegex, $email) ) {
                $isValid = false;
                $errors[] = 'Please Enter a valid email.';
            }
            
            if (UserExist($email) == false ) {
                $isValid = false;
                $errors[] = 'Email already exists. Please try again.';
            }
            
            if ( empty($confirmPassword) && empty($password)) {
                $isValid = false;
                $errors[] = 'A Password must be entered';
            }
            
            if ( $password != $confirmPassword ) {
                $isValid = false;
                $errors[] = 'Passwords do not match. Please try again';
            }
                      
            if ( $isValid ) {
                if (createUser($email, $password ) ) {
                    $results[] = 'User created successfully!';
                } else {
                    $errors[] = 'Account not created, please try again.';
                }

                }
        }
        ?>
        <div id="nav">
            <a class="addLoginbtn" href="index.php" title="login">Login</a>
        </div>
               
        <div id="wrapper2">
            <section>
                <img id="addImg" src="../images/logo3.png"/>
            </section>
            
            <aside>
            <?php include_once '../includes/create_user_form.php'; ?>
                <center><?php if (isset($results)){include_once '../includes/results.html.php';} ?></center>
            
            
            <?php if (isset($errors)) : ?>
            <h3 id="h3">Account Creation Failed:</h3>
            <div id="createUserErrors">
            <?php include_once '../includes/errors.php'; endif ?>
            </div>
            </aside>
       
        </div>
    </body>
</html>
