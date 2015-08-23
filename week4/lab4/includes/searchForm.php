<div class="floatright">
<form action="#" method="get">
     <fieldset>
    <label id="searchlbl">Search table by:</label>  
    <select id="searchdropdwn" name="searchColumn">
        <?php  
          $getColumn = columnsDropDown();
//        $getColumn = array("id" => 'ID',
//                    "corp" => 'Corporation',
//                    "incorp_dt" => 'Incorporation Date',
//                    "email" => 'Email',
//                    "zipcode" => 'Zip Code',
//                    "owner" => 'Owner',
//                    "phone" => 'Phone',
//        );
        foreach ($getColumn as $key => $value):
        ?> 
    <option value="<?php echo $key; ?>">
        <?php echo $value; ?></option>
        <?php endforeach; ?>
    </select>
<br/>

   
        <input id="placeholder" name="searchQuery" type="search" placeholder="Search...." />
    <br/>
    
    <input type="hidden" name="action2" value="clear" />
        <input class="btn-style2" type="reset" value="Reset" />
        
        <input type="hidden" name="action" value="search" />
        <input class="btn-style2" type="submit" value="Submit" />
        
        
    </fieldset>            
</form>
</div>