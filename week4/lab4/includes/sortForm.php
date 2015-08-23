<div class="floatleft">
    
<!-- creates form using get method(URL) -->
<form id="sortform" action="#" method="get">
    <label id="sortlbl">Sort table by:</label>  
    
    <!-- <select> creates a drop down menu -->
    <select id="sortdropdown" name="orderByColumn">
        <?php 
        
          /* drop down options are created using associative array, 
           * created in function "columnsDropDown()"
           */
          $getColumn = columnsDropDown();
          
          // uses key value pair from array to populate the dropdown menu
        foreach ($getColumn as $key => $value):
        ?> 
    <option value="<?php echo $key; ?>">
        <?php echo $value; ?></option>
        <?php endforeach; ?>
    </select>
    
   <br/>
    <label>Sort Order:</label>  
    
        <!-- radio buttons, value asc or desc, to sort data 
              by ascending or descending ORDER -->
        <input class="radios" type="radio" name="sortOrder" value="asc" >Ascending
        <input type="radio" name="sortOrder" value="desc" >Descending
        <br/>
    
        
    <!-- submit button to order form, using ORDER BY sql statement -->
    <input type="hidden" name="action" value="sort" />
    <input class="btn-style" type="submit" value="Submit" />
    
    <!-- Reset button to clear sort form -->
    <input type="hidden" name="action2" value="reset" />
    <input class="btn-style" type="reset" value="Reset" />
        <br/>
</fieldset>    
</form>
</div>
