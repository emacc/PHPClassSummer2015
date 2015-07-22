<?php
    $myvar = 'hello';
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> <?php echo 'My page Title' .$myvar; ?></title>
    </head>
    <body>
       
        <h1>
        <?php
            $randNumber = rand(1,10);
            
            echo  'my number is '.$randNumber;
        ?>
        </h1>
    </body>
</html>
