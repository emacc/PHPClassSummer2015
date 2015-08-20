<form action="#" method="get">
    <label>Sort table by:</label>  
    <select name="orderByColumn">
        <?php $orderByColumn = filter_input(INPUT_GET, 'orderByColumn');
        $getColumn = array("id" => 'ID',
                    "corp" => 'Corporation',
                    "incorp_dt" => 'Incorporation Date',
                    "email" => 'Email',
                    "zipcode" => 'Zip Code',
                    "owner" => 'Owner',
                    "phone" => 'Phone',
        );
        foreach ($getColumn as $key => $value):
        ?> 
    <option value="<?php echo $key; ?>">
        <?php echo $value; ?></option>
        <?php endforeach; ?>
    </select>
    
   
    <label>Sort Order:</label>  
        <input type="radio" name="sortOrder" value="asc" >Ascending
        <input type="radio" name="sortOrder" value="desc" >Descending
        <br/>
    
        
        
    <input type="hidden" name="action" value="sort" />
    <input type="submit" value="Submit" />
    
    <input type="hidden" name="action2" value="clear" />
    <input type="reset" value="Reset" />
        
    
</fieldset>    
</form>
