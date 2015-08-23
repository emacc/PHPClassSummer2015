<div class="floatleft">
<form id="sortform" action="#" method="get">
    <label id="sortlbl">Sort table by:</label>  
    <select id="sortdropdown" name="orderByColumn">
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
    <label>Sort Order:</label>  
        <input class="radios" type="radio" name="sortOrder" value="asc" >Ascending
        <input type="radio" name="sortOrder" value="desc" >Descending
        <br/>
    
        
        
    <input type="hidden" name="action" value="sort" />
    <input class="btn-style" type="submit" value="Submit" />
    
    <input type="hidden" name="action2" value="clear" />
    <input class="btn-style" type="reset" value="Reset" />
        <br/>
</fieldset>    
</form>
</div>
