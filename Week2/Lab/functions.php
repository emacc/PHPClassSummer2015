<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            function isPostRequest() {
                return (filter_input(INPUT_SERVER, 'REQUEST_METHOD')=== 'POST');
            }
            
            function isGetRequest() {
                return (filter_input(INPUT_SERVER, 'REQUEST_METHOD')=== 'Get');
            }
        ?>
    </body>
</html>
