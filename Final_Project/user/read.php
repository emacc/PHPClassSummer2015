<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <title>Read Contact Address</title>
    </head>
    <body>
        <?php
        /* Connect to DB and include functions */
        require_once '../includes/session-start.req-inc.php';
        require_once '../includes/access-required.html.php';
        
        include_once '../functions/dbconnect.php';
        include_once '../functions/address_functions.php';
        
        /* POST and GET statements share database connect function */
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
         <?php if ($isValid === true) :?>   
         <table border="2">
            <thead>
                <tr>
                    <th>address_group</th>
                    <th>fullname</th>
                    <th>email</th>
                    <th>address</th>
                    <th>phone</th>
                    <th>website</th>
                    <th>birthday</th>
                    <th>image</th>
                </tr>
            </thead>
        <?php foreach($address as $row): ?>
            <tr>
               <?php /* Displays database info */?>
                <td><?php echo $row['address_group']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['website']; ?></td>
                <td><?php echo date("m/d/Y",strtotime($row['birthday'])); ?></td>
                 <td><?php if ( empty($row['image']) ) : ?>
                    No Image
                <!-- ********** STYLE IMAGE IN CSS (WIDTH/HEIGHT) !!!!! ******** -->
                <?php else: ?><img src="../images/<?php echo $row['image']; ?>" width="100" height="100" /></td>
               <?php endif; ?>
<!--                <td align="center"><a class="col-lg-12" href="delete.php?id=<?php //echo $row['id']; ?>">Delete</a></td>
                <td align="center"><a class="col-lg-12" href="update.php?id=<?php //echo $row['id']; ?>">Update</a></td>-->
            </tr>
        <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <br/>
        <a href ="index.php">Go Back</a>

    
</body>
</html>