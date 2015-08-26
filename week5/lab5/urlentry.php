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
        
        require './functions/dbconnect.php';
        require './functions/util.php';
        
        $db = dbconnect();
        
        $site = filter_input(INPUT_POST, 'url');
        

        $isValid = true;
        
        $errorMsg = "";
        $output = "";
        $linkMatches = "";
        $printSite = "";
       
        
        // Temporary to display table data
        $stmt = $db->prepare("SELECT * FROM sites JOIN sitelinks ON sites.site_id = sitelinks.site_id");
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
       
         if (isPostRequest()) {
            if (filter_var($site, FILTER_VALIDATE_URL) === false) {
                $isValid = false;
                $errorMsg = "URL is invalid. Be sure to include \"http://\"";
            }
            
            $stmt = $db->prepare("SELECT site FROM sites WHERE site LIKE '$site'");
            if ($stmt->execute() && $stmt->rowCount() > 0) {
            $count = $stmt->rowCount();
            $isValid = false;
            $errorMsg .= "There is already $count record with this url in the Database. <br/> Please enter a new one.";
                 
            }
         
            //create curl resource 
            $curl = curl_init(); 

            // set url 
            curl_setopt($curl, CURLOPT_URL, $site); 

            //return the transfer as a string 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 

            // $output contains the output string 
            $output = curl_exec($curl); 
            
            // close curl resource to free up system resources 
            curl_close($curl); 
            
            if ($output === '')
            {   
                $isValid = false;
                $errorMsg .= "Entered url produced no data, please use a new one.";
            }
            
             if ($isValid) {
            $printSite = $site;
            
            $htmlRegex =  '/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';
             
            preg_match_all($htmlRegex, $output, $siteMatches);
           
            $linkMatches = array_unique($siteMatches[0]);
            
            $stmt = $db->prepare("INSERT INTO sites SET site = :site, date = now()");
            
            $binds = array(
                    ":site" => $site);
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    /* get the last insert ID to use as the relational id */
                    $site_id = $db->lastInsertId();
                    // var_dump($site_id);
                    
                    $stmt = $db->prepare("INSERT INTO sitelinks SET link = :link, site_id = :site_id");
                    
                    foreach ($linkMatches as $link) {
                        $binds = array( ":link" => $link, ":site_id" => $site_id); 
                        $stmt->execute($binds);
                    } 
            }
             $site = "";
          }
         
         }
        
       
        
        
         if (!$isValid) : ?>
            <h1><?php echo $errorMsg ?></h1>
        <?php endif; ?>
            
        <form method="post" action="#">
            Enter URL:<input type="text" name="url" value="<?php echo $site; ?>" />
             <input type="hidden" name="action" value="submit" />
            <input type="submit" value="Submit" />

            <input type="hidden" name="action" value="reset" />
            <input type="reset" value="Reset" />
        </form>
            
            <br/>
            <br/>
            <textarea><?php echo  $output; ?></textarea>
            <br/>
            <br/>
            <?php if ($linkMatches != '' && $printSite != ''): ?>
        <table border ="1">
            <thead>
                <tr>
                    <th>The following site was Added Successfully to the sites table</th>
                </tr>
            </thead>
            
            <tr>
                <td><?php echo $printSite ?></td>
            </tr>
        </table>
        
        <p>
        <table border ="1">
            <thead>
                <tr>
                    <th>The following links were Added Successfully to the sitelinks table</th>
                </tr>
            </thead>
            
            <?php foreach ($linkMatches as $row): ?>
            <tr>
                <td><?php echo $row ?></td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </table>
        </p>
            
        <?php /* View table
             <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>site</th>
                    <th>date</th>
                    <th>link</th>

                </tr>
            </thead>
            <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo $row['site_id']; ?></td>
                <td><?php echo $row['site']; ?></td>
                <td><?php echo date("m/d/Y",strtotime($row['date'])); ?></td>
                <td><?php echo $row['link']; ?></td>
            </tr>
        <?php endforeach; ?>
            </tbody>
        </table> */ ?>
    </body>
</html>
