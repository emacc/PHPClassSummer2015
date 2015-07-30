<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include './dbconnect1.php';
            include './functions.php';
            
            $results = '';
            
            if (isPostRequest()) {
                $db = getDatabase();
                
                $stmt = $db->prepare("INSERT INTO actors SET firstName = :firstname, lastName = :lastname, dob = :dob, height = :height");
               
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
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    $results = 'Data Added';
              
                }
            }
        ?>
        
         
        <h1><?php echo $results; ?></h1>
 
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