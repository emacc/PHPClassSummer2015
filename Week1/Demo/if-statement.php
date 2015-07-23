<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $a = 0;
            $b = false;
            $value = 'foo';
            /*
             * 
             */
          ?>  
            <?php if($a === $b): ?>
                'A === B'
            <?php endif; ?>
             <br />   
            <?php if($a == $b): ?>
                'A == B'
            <?php endif; ?>
                
        <?php
            if ( $a === $b ) {
                echo 'A === B';
            }
            echo '<br />';
            if ( $a == $b ) {
                echo 'A == B';
            }
        
        ?>
        
        <?php if($value == "foo"): ?>
        <p><?php echo $value; ?></p>
        <?php endif; ?>
        
        
        
    </body>
</html>