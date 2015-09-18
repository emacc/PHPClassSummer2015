 <table border="2">
    <thead>
        <tr>
            <th><h1>fullname</h1></th>
            <th><h1>address</h1></th>
        </tr>
    </thead>
        <tbody>
            <?php foreach ($contacts as $row): ?>
                <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                     <td><a href="read.php?address_id=<?php echo $row['address_id']; ?>">Read</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>    