<form action="#" method="get">
     <fieldset>
    <label>Search table by:</label>  
    <select name="orderByColumn">
        <?php  
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
<br/>

   
        <input name="dataone" type="search" placeholder="Search...." />
        <input name="datatwo" value="data2" type="hidden" />
    
         <input type="hidden" name="action" value="search" />
        <input type="submit" value="Submit" />
    </fieldset>            
</form>