<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        
        
        
        
        if ( isPostRequest() ) {
            
            $address_group_id = filter_input(INPUT_POST, 'address_group_id');
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $address = filter_input(INPUT_POST, 'address');
            $phone = filter_input(INPUT_POST, 'phone');
            $website = filter_input(INPUT_POST, 'website');
            $birthday = filter_input(INPUT_POST, 'birthday');
            
            
//            $errors = array();
//            
//            if ( !isValidProduct($product) ) {
//                $errors[] = 'Product is not Valid';
//            }
//            
//            if ( !isValidPrice($price) ) {
//                $errors[] = 'Price is not Valid';
//            }
//            
//             if ( empty($image) ) {
//                $errors[] = 'image could not be uploaded';
//            }
            
//            $image = uploadProductImage();
//            
//            if ( count($errors) == 0 ) {
            
              $image = uploadProductImage();
                
                if ( createAddress($user_id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday, $image ) ) {
                    $results = 'Address Added';
                } else {
                    $results = 'Address was not Added';
                    var_dump($user_id, $address_group_id);
                }
//                
//            }
            
        }
        
        
        
        ?>
        
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
        
        
        
    </body>
</html>
