<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <title>Add Corporation</title>
    </head>
    <body><center>
        <?php
        /* Connect to DB and include functions page */
        include_once './dbconnect.php';
        include './functions.php';

        $results = '';

        if (isPostRequest()) {
            $db = dbconnect();
            /* Prepares insert statement into database and prepares variables */
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");

            /* Sets variables */
            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');

            $binds = array(
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );

            /* IF Executed correctly, sets results variable to "Data Added" */
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>

        <?php /* Display results variable: "Data Added" */ ?>
        <h1><?php echo $results; ?></h1>

        <?php /* Form for entering data into database. # sign keeps user on the same page! */ ?>
        <form method="post" action="#">            
            <h4>Corporation Name <input type="text" value="" name="corp" /></h4>

            <h4 style="margin-left: 83px;">Email <input style="margin-left: 5px;" type="text" value="" name="email" /></h4>

            <h4 style="margin-left: 63px;">Zip Code<input style="margin-left: 8px;" type="text" value="" name="zipcode" /></h4>

            <h4 style="margin-left: 78px;">Owner <input style="margin-left: 5px;" type="text" value="" name="owner" /></h4>

            <h4 style="margin-left: 22px;">Phone Number <input style="margin-left: 5px;" type="text" value="" name="phone" /></h4>

            <br />
            <input class="btn-toolbar" type="submit" value="Submit" />
        </form>
        <br />

        <a href="view.php"> Go back </a>
    </center>         
</body>
</html>