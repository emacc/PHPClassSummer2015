<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <!-- Style Sheet -->
        <link rel="stylesheet" type="text/css" href="../css/user_home.css">
        <link rel="stylesheet" type="text/css" href="../css/create_account_home_login_css.css">
        
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        
        <title>Read Contact Address</title>
    </head>
    <body>
        
        <?php
        /* Connect to DB and include functions */
        require_once '../includes/session-start.req-inc.php';
        require_once '../includes/access-required.html.php';
        
        include_once '../functions/dbconnect.php';
        include_once '../functions/address_functions.php';
        
        
        $db = dbconnect();
        $isValid = true;
        $user_id = $_SESSION['user_id'];
        $address_id = filter_input(INPUT_GET, 'address_id');
        $address = getAddressByID($address_id, $user_id);
        
        if ($address === FALSE) {
            $errors[] = 'Contact Address does not exist!';
            $isValid = false;
        }
       include '../includes/errors.php';
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
        
         <?php if ($isValid === true) :?>   
        
<center>
<!--       <div id="wrapperRead">-->
        <div class="datagridRead">
         <table border="1">
            <?php foreach($address as $row): ?>
            <thead>
                <tr>
                    <th>address_group</th>
                    <td><?php echo $row['address_group']; ?></td>
                </tr>
                <tr>
                    <th>fullname</th>
                     <td><?php echo $row['fullname']; ?></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
                </tr>
                    <th>address</th>
                    <td><?php echo $row['address']; ?></td>
                </tr>
                <tr>
                    <th>phone</th>
                    <td><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></td>
                </tr>
                <tr>
                    <th>website</th>
                    <td><a href="www.google.com" target="_blank"><?php echo $row['website']; ?></a></td>
                </tr>
                <tr>
                    <th>birthday</th>
                     <td><?php echo date("m/d/Y",strtotime($row['birthday'])); ?></td>
                </tr>
                <tr>
                    <th>image</th>
                     <td><?php if ( empty($row['image']) ) : ?>
                    No Image
                <!-- ********** STYLE IMAGE IN CSS (WIDTH/HEIGHT) !!!!! ******** -->
                <?php else: ?><img src="../images/<?php echo $row['image']; ?>" width="100" height="100" /></td>
               <?php endif; ?>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td><a href="update.php?address_id=<?php echo $row['address_id']; ?>">Update</a></td>
                <td><a href="delete.php?address_id=<?php echo $row['address_id']; ?>">Delete</a></td> 
            </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        <?php endif; ?>
        <br/>
        <h3 id="loginh4"><a class="loginLink" href="../site/index.php">Go Back</a></h3>
</center>
<!--        </div>-->
    
</body>
</html>