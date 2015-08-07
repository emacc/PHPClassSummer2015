<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /* Connect to DB and include functions */
        include './dbconnect.php';
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
                    <th><h1>ID</h1></th>
        <th><h1>Corporation</h1></th>
    <th colspan="2"><form action="add.php" method="post"><input type="submit" style="width:150px; height:55px" value="Add New Corporation" </td></form>
</tr>
</thead>
<tbody>
    <?php foreach ($results as $row): ?>
        <tr>
            <?php /* Displays database info */ ?>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['corp']; ?></td>
            <td><form action="delete.php" method="post"><input type="submit" style="width:100px; height:25px" value="Delete"></td></form>
            <td><form action="update.php" method="post"><input type="submit" style="width:100px; height:25px" value="Update"</td></form>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>

<form action="update.php"method="post">
    <input type="submit" value="Update"/>
</form>
<input type="submit" style="width:500px" value="Delete">
</body>
</html>