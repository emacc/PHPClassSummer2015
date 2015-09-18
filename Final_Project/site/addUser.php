<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <nav>
            <a href="index.php">Login</a>
        </nav>
        <?php
        
        include_once '../functions/dbconnect.php';
        include_once '../functions/util.php';
        include_once '../includes/create_user_form.php';
        include_once '../functions/user_functions.php';
        
        if ( isPostRequest() ) {
            
            $isValid = true;
            
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $confirmPassword = filter_input(INPUT_POST, 'passwordConfirm');
            $emailOnlyRegex = '/^[a-zA-Z0-9$]+[@]{1}[a-zA-Z]+[\.]{1}[a-zA-Z]{2,3}$/';
            //^\({1}[1-9]{1}[0-9]{2}\){1}[1-9]{1}[0-9]{2}-{1}[0-9]{4}
            if ( !preg_match($emailOnlyRegex, $email) ) {
                $isValid = false;
                $errors[] = 'Error: Please Enter a valid email. EX: (email@email.com)';
            }
            
            if ( $password != $confirmPassword ) {
                $isValid = false;
                $errors[] = 'Passwords do not match. Please try again';
            }
            
            if (UserExist($email) == false ) {
                $isValid = false;
                $errors[] = 'Email already exists. Please try again.';
            }
            
            if ( $isValid ) {
                if (createUser($email, $password ) ) {
                    $results[] = 'User created successfully!';
                } else {
                    $errors[] = 'Account not created, please try again.';
                }

                }
        }
            
            if (isset($results)) {
                include_once '../includes/results.html.php';
            }
            
            if (isset($errors)) {
                include_once '../includes/errors.php';
            }
        ?>
        
    </body>
</html>
