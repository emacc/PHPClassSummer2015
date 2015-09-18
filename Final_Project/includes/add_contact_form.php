<form method="post" action="#" enctype="multipart/form-data">
            
            Address Group:
            <select name="address_group_id">
            <?php foreach ($address_groups as $row): ?>
                <option value="<?php echo $row['address_group_id']; ?>">
                    <?php echo $row['address_group']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            
            
            Full Name <input type="text" name="fullname" /> 
            <br />
            email: <input type="text" name="email" /> 
            <br />
            address: <input type="text" name="address" /> 
            <br />
            phone: <input type="text" name="phone"  /> 
            <br />
            website: <input type="text" name="website"  /> 
            <br />
            birthday: <input type="date" name="birthday" /> 
            <br />
            Image: <input type="file" name="upfile" /> 
            <br />
            <br />
            <input type="submit" value="Submit" />
        </form>
        
        <br/>
        <a href ="index.php">Go Back</a>