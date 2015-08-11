<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <title>Update Corporation</title>
    </head>
    <body><center>
        <?php
        /* Connect to DB and include functions */
        include_once './dbconnect.php';
        include_once './functions.php';
        
        /* POST and GET statements share database connect function */
        $db = dbconnect();
        
        /* Sets a default for variables */
        $corp = '';
        $email = '';
        $zipcode = '';
        $owner = '';
        $phone = '';

        if (isPostRequest() ) {
            
            $id = filter_input(INPUT_POST, 'id');
            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
            
            $stmt = $db->prepare("UPDATE corps SET corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone WHERE id = :id");
            
            $binds = array(
                ":id" => $id,
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );
            
            $message = 'Update Failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $message = 'Update Completed';
            }
        }
        
        else {
            $id = filter_input(INPUT_GET, 'id');
        }

        /* statment selects from database */
        $stmt = $db->prepare("SELECT * FROM corps WHERE id = :id");

        /* binds results into array */
        $binds = array(
            ":id" => $id
        );

        /* result = array */
        $results = array();

        /* test if statement executes */
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $corp = $results['corp'];
            $email = $results['email'];
            $zipcode = $results['zipcode'];
            $owner = $results['owner'];
            $phone = $results['phone'];
        }
        ?>

        <p>
            <?php if (isset ($message)) {
                echo $message;
            } ?>
        </p>
        
        <form method="post" action="#">
        <h4>Corporation Name <input type="text" name="corp" value="<?php echo $corp ?>"  /></h4>

        <h4 style="margin-left: 83px;">Email <input style="margin-left: 5px;" type="text" name="email" value="<?php echo $email ?>"/></h4>

        <h4 style="margin-left: 63px;">Zip Code<input style="margin-left: 8px;" type="text" value="<?php echo $zipcode ?>" name="zipcode" /></h4>

        <h4 style="margin-left: 78px;">Owner <input style="margin-left: 5px;" type="text" value="<?php echo $owner ?>" name="owner" /></h4>

        <h4 style="margin-left: 22px;">Phone Number <input style="margin-left: 5px;" type="text" value="<?php echo $phone ?>" name="phone"/></h4>

        <br />
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <input class="btn-toolbar" type="submit" value="Submit" />
        </form>
        <br/><br/>
        <a href ="view.php">Go Back</a>

    </center>
</body>
</html>