<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <nav>
            <a href ="urlentry.php">Home</a>
            <a href ="siteLookup.php">Site Lookup</a>
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
 
            <select name="site_id">
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

            <input type="submit" value="Submit" />
        </form>
            
        <?php if( isset($results) ): ?>
            <p><h2><?php echo count($results); ?> Results found for <?php echo $row['site'];?><br/>
           <?php echo " Retrieved on $date";?></h2></p>
            <table border="1">        
                <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><a href="<?php echo $row['link']; ?>" target="popup"/><?php echo $row['link']; ?></a></td> 
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </body>
</html>
