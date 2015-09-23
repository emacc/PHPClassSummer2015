<form method="post" action="#" enctype="multipart/form-data">
            
            Address Group:
            <select name="address_group_id">
            <?php foreach ($address_groups as $row): ?>
                <option value="<?php echo $row['address_group_id']; ?>" <?php if( intval($address_group_id) === $row['address_group_id']) : ?>
                        selected="selected"
                        <?php endif; ?>>
                    <?php echo $row['address_group']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            
            
            Full Name <input type="text" name="fullname" value="<?php echo $fullname; ?>"/> 
            <br />
            email: <input type="text" placeholder="example@example.com" name="email" value="<?php echo $email; ?>"/> 
            <br />
            address: <input type="text" name="address" value="<?php echo $address; ?>" /> 
            <br />
            phone: <input type="text" placeholder="EX: (XXX)XXX-XXXX" name="phone" value="<?php echo $phone; ?>" /> 
            <br />
            website: <input type="text" name="website" value="<?php echo $website; ?>" /> 
            <br />
            birthday: <input type="date" name="birthday"value="<?php echo $birthday; ?>" /> 
            <br />
            Image: <input type="file" name="upfile" /> 
            <br />
            <br />
            <input type="submit" value="Submit" />
        </form>
        
        <br/>
        <a href ="index.php">Go Back</a>