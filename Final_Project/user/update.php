<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" type="text/css" href="../css/create_account_home_login_css.css">
        
         <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        
        <title>Update Contact</title>
    </head>
    <body><center>
        <?php
        /* Connect to DB and include functions */
        include_once '../includes/session-start.req-inc.php';
        include_once '../includes/access-required.html.php';
        
        include_once '../functions/dbconnect.php';
        include_once '../functions/address_functions.php';
        include_once '../functions/util.php';
        include_once '../functions/image_upload.php';
        
        $db = dbconnect();
        
        $user_id = $_SESSION['user_id'];
        
        $address_groups = getAllGroups();
        
        $address_group_id = '';
        $address_id = '';
        $fullname = '';
        $email = '';
        $address = '';
        $phone = '';
        $website = '';
        $birthday = '';
        $image = '';
        

        if (isPostRequest() ) {
            // Get post values to populate fields
            $address_group_id = filter_input(INPUT_POST, 'address_group_id');
            $address_id = filter_input(INPUT_POST, 'address_id');
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $address = filter_input(INPUT_POST, 'address');
            $phone = filter_input(INPUT_POST, 'phone');
            $website = filter_input(INPUT_POST, 'website');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $image = filter_input(INPUT_POST, 'upfile');
            $img = uploadProductImage();
          
            
            // function to update database
            updateNoImg($address_group_id, $address_id, $user_id, $fullname, $email, $address, $phone, $website, $img);
            
        }
        
        else {
            $address_id = filter_input(INPUT_GET, 'address_id');
        }
           
        //fill variables from database function
        $results = getAddress($address_id, $user_id);
        $address_group_id = $results['address_group_id'];
        $fullname = $results['fullname'];
        $email = $results['email'];
        $address = $results['address'];
        $phone = $results['phone'];
        $website = $results['website'];
        $image = $results['image'];
//        /* statment selects from database */
//        $stmt = $db->prepare("SELECT * FROM address WHERE address_id = :address_id AND user_id = :user_id");
//
//        /* binds results into array */
//        $binds = array(
//            ":address_id" => $address_id,
//            ":user_id" => $user_id
//        );
//
//        /* result = array */
//        $results = array();
//
//        /* test if statement executes */
//        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
//            $results = $stmt->fetch(PDO::FETCH_ASSOC);
//            $address_group_id = $results['address_group_id'];
//            $fullname = $results['fullname'];
//            $email = $results['email'];
//        }
        ?>

        <p>
            <?php if (isset ($message)) {
                echo $message;
            } ?>
        </p>
        
        <!-- update form -->
        <form method="post" action="#" enctype="multipart/form-data">
        Address Group:
            <select name="address_group_id">
            <?php foreach ($address_groups as $row): ?>
                <option value="<?php echo $row['address_group_id']; ?>"
                        <?php if( intval($address_group_id) === $row['address_group_id']) : ?>
                        selected="selected"
                        <?php endif; ?>>
                    <?php echo $row['address_group']; ?>
                </option>
            <?php endforeach; ?>
            </select>
        <br/>
        fullname <input type="text" name="fullname" value="<?php echo $fullname ?>"/>
        <br />
        email <input type="text" name="email" value="<?php echo $email ?>"/>
        <br />
        address <input type="text" name="address" value="<?php echo $address ?>"/>
        <br />
        phone <input type="text" name="phone" value="<?php echo $phone ?>"/>
        <br />
        website <input type="text" name="website" value="<?php echo $website ?>"/>
        <br />
        birthday <input type="date" name="birthday" value="<?php echo $birthday ?>"/>
        <br />
        <?php if ( empty($image) ) : ?>
                    No Image
                <?php else: ?>
                    Current Image:<img src="../images/<?php echo $image; ?>" width="100" height="100" /></td>
        <?php endif; ?><br/>
        Update Image <input type="file" name="upfile" /></h4><br />
        <input type="hidden" name="address_id" value="<?php echo $address_id ?>" />
        <input type="hidden" name="upfile" value="<?php echo $image ; ?>" />
        <input class="btn-toolbar" type="submit" value="Submit" />
        </form>
        <?php //if (isset($error)) { echo $error; } ?>
        <br/><br/>
        <h4 class="loginh4"><a class="loginLink" href ="index.php">Home</a></h4>

    </center>
</body>
</html>