<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body><center>
        <?php
        /* Connect to DB and include functions */
        include_once './dbconnect.php';
        include './functions.php';

        /* DB variable set to function */
        $db = dbconnect();

        /* Select statement for view */
        $stmt = $db->prepare("SELECT id, corp FROM corps");
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
        ?>

        <?php /* Begins table with headers */ ?>
        <table border="1">
            <thead>
                <tr>
        <th><h1>Corporation</h1></th>
    <th colspan="3"><!--<form action="add.php" method="post"><input type="submit" style="width:150px; height:55px" value="Add New Corporation" </td></form>-->
            <a href="add.php">Click Here to <br/>Add A New Corporation</a>
</tr>
</thead>
<tbody>
    <?php foreach ($results as $row): ?>
        <tr>
            <?php /* Displays database info */ ?>
            <td><?php echo $row['corp']; ?></td>
            <td align="center"><a href="read.php?corp=<?php echo $row['corp']; ?>">Read</a></td>
            <td align="center"><a href="delete.php?corp=<?php echo $row['corp']; ?>">Delete</a></td>
            <td align="center"><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
    </center>
</body>
</html>