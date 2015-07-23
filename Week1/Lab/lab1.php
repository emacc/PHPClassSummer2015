<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
<table border="1">
          
<?php for($tr = 1; $tr <= 10; $tr++):?>
    <tr> 
        <?php for($td = 1; $td <= 10; $td++):?>
            <td style="background-color:<?php $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF))); echo $randColor;?>">
                <?php echo $randColor; ?>
            </td>
        <?php endfor; ?>
    </tr>
<?php endfor; ?>
         
      </table>
    </body>
</html>
