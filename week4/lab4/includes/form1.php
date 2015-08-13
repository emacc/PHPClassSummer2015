<form action="#" method="get">
        <label>Sort table by:</label>  
        <select name="orderByColumn">
              <?php $getColumn = 
                    array("id" => 'ID',
                          "corp" => 'Corporation',
                          "incorp_dt" => 'Incorporation Date',
                          "email" => 'Email',
                          "zipcode" => 'Zip Code',
                          "owner" => 'Owner',
                          "phone" => 'Phone',
                        );
                foreach ($getColumn as $key => $value): ?> 
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php endforeach;   ?>
        </select>
        <input type="hidden" name="action" value="Submit1" />
        <input type="submit" value="Submit" />
    </fieldset>    
</form>