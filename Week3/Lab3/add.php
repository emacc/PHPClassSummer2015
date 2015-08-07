<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /* Connect to DB and include functions page */
        include './dbconnect.php';
        include './functions.php';

        $results = '';

        if (isPostRequest()) {
            $db = dbconnect();
            /* Prepares insert statement into database and prepares variables */
            $stmt = $db->prepare("INSERT INTO corps SET firstName = :firstname, lastName = :lastname");

            /* Sets variables */
            $firstName = filter_input(INPUT_POST, 'firstname');
            $lastName = filter_input(INPUT_POST, 'lastname');
            $dob = filter_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');
            $binds = array(
                ":firstname" => $firstName,
                ":lastname" => $lastName,
                ":dob" => $dob,
                ":height" => $height
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
            First Name <input type="text" value="" name="firstname" />
            <br />
            Last Name <input type="text" value="" name="lastname" />
            <br />           
            Date of Birth <input type="date" value="" name="dob" />
            <br />  
            Height <input type="text" value="" name="height" />
            <br />  
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>