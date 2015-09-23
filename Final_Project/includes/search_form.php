<div id="searchForm">
    
<!-- creates form using get method(URL) -->
<form action="#" method="get">
     <fieldset>
    <label>Search table by:</label>  
    
    <!-- <select> creates a drop down menu -->
    <select name="searchColumn">
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

        <!-- creates search box, where "searchQuery" is obtained -->
        <input id="placeholder" name="searchQuery" type="search" placeholder="Search...." />
    <br/>
    
        <!-- reset button -->
        <input type="hidden" name="action" value="reset" />
        <input class="btn-style2" type="reset" value="Reset" />
        
        <!-- search submit button -->
        <input type="hidden" name="action" value="search" />
        <input class="btn-style2" type="submit" value="Submit" />
                
    </fieldset>            
</form>
</div>