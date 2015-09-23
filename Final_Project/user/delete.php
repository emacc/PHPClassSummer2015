<!DOCTYPE html>
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
        
        
        <title>User - Home</title>
    </head>
    <body>
        
        
        <?php
        include_once '../includes/session-start.req-inc.php';
        require_once '../includes/access-required.html.php';
        include_once '../functions/dbconnect.php';
        include_once '../functions/address_functions.php';
        include_once '../functions/util.php';
        
        $address_id = filter_input(INPUT_GET, 'address_id');
        $user_id = $_SESSION['user_id'];
        
        //$delete = deleteAddress($address_id, $user_id);
        $contact = getAddressByID($address_id, $user_id);
        
        foreach ($contact as $row) {
            $fullname = $row['fullname'];
        }
        
        $confirm = "Are you sure you want to delete Record $address_id, \"$fullname\"?";
        
        $action = filter_input(INPUT_POST, 'action');
        
            if ($action === 'Yes') {
                $delete = deleteAddress($address_id, $user_id);
                
                if ($delete) {                
                $confirm = "Record $address_id, \"$fullname\" Deleted Successfully!"; 
                }
                
                else { 
                    $confirm = "Record $address_id, \"$fullname\" Not Deleted";
                }
            }
            
            if ($action == 'No') {
                header("Location: ../user/index.php");
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
        <div id="wrapper">
            
        <center>
            <h2><?php echo $confirm; ?></h2> 
            <?php if ($action != "Yes"): ?>
            <form method="post" action="#">
            <input class="loginSubmit" name="action" type="submit" value="Yes" />  
            <input class="loginSubmit" name="action" type="submit" value="No" />  
            </form>
            <?php endif; ?>
            <?php if ($action ==="Yes"): ?>
            <h4 id="loginh4"><a class="loginLink" href="../site/index.php">Go Back</a></h4>
            <?php endif; ?>
                   
        </div>
        </div>
    </body>
</html>
