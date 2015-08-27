<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            
            <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <title>Site Lookup</title>
    </head>
    <body>
        <div class="wrapper">
        <nav class="navbar navbar-inverse">
            <ul class="nav nav-pills">
                <li role="presentation" class="btn-lg"><a class="nav" href ="urlentry.php">Home</a></li>
                <li role="presentation" class="btn-lg"><a class="nav" href ="siteLookup.php">Site Lookup</a></li>
            </ul>
        </nav>
        <?php
            date_default_timezone_set('America/New_York');
            $date = date('m/d/Y h:i a', time());
        
            require './functions/dbconnect.php';
            require './functions/util.php';
            
            
            $db = dbconnect();
            
             

            $stmt = $db->prepare("SELECT * FROM sites ORDER BY site ASC");
            $site = filter_input(INPUT_POST, 'site');
            $sites = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
            $site_id = '';
            
            if ( isPostRequest() ) {
                $stmt = $db->prepare("SELECT * FROM sitelinks WHERE site_id = :site_id");
                $site_id = filter_input(INPUT_POST, 'site_id');
                $binds = array(
                ":site_id" => $site_id
                );

                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $error = 'No Results found';
                }
            }
            
            
        ?>
        
        <?php if( isset($error) ) : ?>        
            <h1><?php echo $error;?></h1>
        <?php endif; ?>
            
        <form method="post" action="#">
 
            <select name="site_id" id="dropdown">
            <?php foreach ($sites as $row): ?>
                
                <option 
                    value="<?php echo $row['site_id']; ?>"
                    <?php if( intval($site_id) === $row['site_id']) : ?>
                        selected="selected"
                    <?php endif; ?>
                >
                    <?php echo $row['site']; ?>
                </option>
            <?php endforeach; ?>
            </select>

            <input class="btn-default btn-lg" type="submit" value="Submit" />
        </form>
            
        <?php if( isset($results) ): ?>
            <p><h3><?php echo count($results); ?> Link result(s) found for <?php echo getSiteName($site_id);?><br/>
           <?php echo " Retrieved on $date";?></h3></p>
            <table class="tableclass1">        
                <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><a class="tableclass1" href="<?php echo $row['link']; ?>" target="popup"/><?php echo $row['link']; ?></a></td> 
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    </body>
</html>
