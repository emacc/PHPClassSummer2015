<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <title>Read Corporation</title>
    </head>
    <body><center>
        <?php
        /* Connect to DB and include functions */
        include_once './dbconnect.php';
        include_once './functions.php';
        
        /* POST and GET statements share database connect function */
        $db = dbconnect();
        
        $id = filter_input(INPUT_GET, 'id');
        

        /* statment selects from database */
        $stmt = $db->prepare("SELECT * FROM corps WHERE id = :id");

        /* binds results into array */
        $binds = array(
            ":id" => $id
        );

        /* result = array */
        $results = array();

        /* test if statement executes */
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
         
        }
        ?>

         <table class="table-hover" border="2">
            <thead>
                <tr>
                    <th>id</th>
                    <th>corp</th>
                    <th>incorp_dt</th>
                    <th>email</th>
                    <th>zipcode</th>
                    <th>owner</th>
                    <th>phone</th>
                </tr>
            </thead>
        <?php foreach($results as $row): ?>
            <tr>
               <?php /* Displays database info */?>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['corp']; ?></td>
                <td><?php echo date("m/d/Y",strtotime($row['incorp_dt'])); ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['zipcode']; ?></td>
                <td><?php echo $row['owner']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td align="center"><a class="col-lg-12" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                <td align="center"><a class="col-lg-12" href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <br/>
        <a href ="view.php">Go Back</a>

    </center>
</body>
</html>