<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- Style Sheet -->
<!--        <link rel="stylesheet" type="text/css" href="../css/create_account_home_login_css.css">-->
        <link rel="stylesheet" type="text/css" href="../css/user_home.css">
       
        
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        
        
        <title>User - Home</title>
    </head>
    <body>
        <?php
        include_once '../includes/session-start.req-inc.php';
        include_once '../includes/access-required.html.php';
        
        include_once '../functions/dbconnect.php';
        include_once '../functions/address_functions.php';
        
        //$user_id = filter_input(INPUT_GET, 'user_id');
        
        $user_id = $_SESSION['user_id'];
        
        $contacts = getAddressByUser($user_id);
        $getAllGroups = getAllGroups();
        $action = filter_input(INPUT_GET, 'action');
        
        $groupSelected = filter_input(INPUT_GET, 'group_id');
 
        if (NULL !=  $groupSelected) {
                $contacts = getContactByGroupId($groupSelected, $user_id);
            }
            
       if (!$contacts) {
           $msg = 'No matching contacts found.';
       }
       
       if ($action == 'sort') {
                    $orderByColumn = filter_input(INPUT_GET, 'orderByColumn');
                    $sortOrder = filter_input(INPUT_GET, 'sortOrder');
                    $contacts = orderContacts($orderByColumn, $sortOrder, $user_id);
                 }
                 
        if ( $action === 'search' ) {

       /*  Gets search form name from URL
        *  Gets search value from ID in URL
        *  Sets results = results of the search function
        */
       $column = filter_input(INPUT_GET, 'searchColumn');
       $search = filter_input(INPUT_GET, 'searchQuery');
       $contacts = searchContacts($column, $search, $user_id);
      }
               
       // var_dump($user_id);
        ?>
        
     <div id="navUser">
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
            <h2 id="homeh2">Your Address Book - Home</h2>
            
             <div id="selectGroup">
                <h3>View Addresses By: </h3>
                     <?php foreach ($getAllGroups as $row) : ?>
                       <a href="?group_id=<?php echo $row['address_group_id']; ?>"><?php echo $row['address_group']; ?></a><br/>
                     <?php endforeach; ?><br/>
                     <a href="?">Reset</a>
             </div>
            <?php if ($contacts) {
                $address_id = filter_input(INPUT_GET, 'address_id');
                include_once '../includes/sort_form.php';
                include_once '../includes/view.php';
                include_once '../includes/search_form.php';
            }
            
            elseif (isset ($msg)) { ?>
            <h3><?php echo $msg; ?></h3> 
            <?php
            }
            
            else { 
                $errors[] = 'You have no contacts to display - Add some!'; 
            }
            ?>
            <br/>
            <p><?php include_once '../includes/errors.php'; ?></p>
            <br/>
    </center>
</div>
    </body>
</html>
