<div class="datagrid">
    <div id="wrapperView">
       <table>
        <thead>
            <tr>
                <th>fullname</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach ($contacts as $row): ?>
                <tr>
                    <td><?php echo $row['fullname']; ?></td>
                     <td style="padding-right: 5px;"><a class="viewlinks" href="read.php?address_id=<?php echo $row['address_id']; ?>">Read</a></td>
                     <td style="padding-right: 5px;"><a href="update.php?address_id=<?php echo $row['address_id']; ?>">Update</a></td>
                     <td style="padding-right: 15px;"><a href="delete.php?address_id=<?php echo $row['address_id']; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </div>
    </table>
    </div>
</div>