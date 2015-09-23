<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Address</title>
        
         <!-- Style Sheet -->
        <link rel="stylesheet" type="text/css" href="../css/user_home.css">
        <link rel="stylesheet" type="text/css" href="../css/create_account_home_login_css.css">
        
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        
    </head>
    <body>
        <?php
        require_once '../includes/session-start.req-inc.php';
        require_once '../includes/access-required.html.php';
        
        include_once '../functions/dbconnect.php';
        include_once '../functions/util.php';
        include_once '../functions/user_functions.php';
        include_once '../functions/address_functions.php';
        include_once '../functions/image_upload.php';
        
        
        $address_groups = getAllGroups();
        
        $user_id = $_SESSION['user_id'];
        
        $address_group_id = '';
        $fullname = '';
        $email = '';
        $address = '';
        $phone = '';
        $website = '';
        $birthday = '';
       
        
        
        if ( isPostRequest() ) {
            
            $address_group_id = filter_input(INPUT_POST, 'address_group_id');
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $address = filter_input(INPUT_POST, 'address');
            $phone = filter_input(INPUT_POST, 'phone');
            $website = filter_input(INPUT_POST, 'website');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $emailOnlyRegex = '/[a-zA-Z0-9$]+[@]{1}[a-zA-Z]+[\.]{1}[a-zA-Z]{2,3}/';
            $validPhoneRegex = '/\({1}[1-9]{1}[0-9]{2}\){1}[1-9]{1}[0-9]{2}-{1}[1-9]{1}[0-9]{3}/';
           
            if ( isEmptyField($fullname) ) {
                $errors[] = 'Name cannot be blank!';
            }
            
            if (isEmptyField($email) ) {
                $errors[] = 'Email cannot be blank!';
            }
            
            elseif ( !preg_match($emailOnlyRegex, $email) ) {
                    $errors[] = 'Please Enter a valid email. (example@email.com)';
                }
                
            if (isEmptyField($address) ) {
                $errors[] = 'Address cannot be blank!';
            }
            
            if (isEmptyField($phone) ) {
                $errors[] = 'Phone cannot be blank!';
            }
            
            elseif ( !preg_match($validPhoneRegex, $phone) ) {
                    $errors[] = "Please Enter a valid Phone Number: (XXX)XXX-XXXX";
                
                    
                }
            
            if (isEmptyField($birthday) ) {
                $errors[] = 'Birthday cannot be blank!';
            }
          
            if ( empty($errors) ) {
            
              $image = uploadProductImage();
                
                if ( createAddress($user_id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday, $image ) ) {
                    $results[] = 'Address Added';
                } else {
                    $results[] = 'Address was not Added';
                    var_dump($user_id, $address_group_id);
                }
//                
            }
            
        }
        
        
        
        ?>
        
        <div class="nav">
            <img class="navimg" src="../images/logo4.png"/>
            <img class="navimgtext" src="../images/ab_text_only.png"/>
            <form action='../sessiondelete.php' method="post">
            <input class="UserHomeLogout" type="submit" name="action" value="Log Out">
            </form>
            <a class="userAddContactBtn" href="add_address.php">Add Contact</a>
            <a class="userHomeBtn" href="index.php">Home</a>
        </div>
    <center>
        <h1>Add Address</h1>
        
        <?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
        
        <?php include '../includes/results.html.php'; ?>
               
        <?php include_once '../includes/add_contact_form.php'; ?>
        
        
    </center>
    </body>
</html>
