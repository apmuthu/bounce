<select name="tech" id="weekend">
<?php

include('../connect.php');


		$resultdd = mysql_query("SELECT * FROM users")or die (mysql_error());		
		while($row_get_tech = mysql_fetch_array($resultdd))
		{
	
				$client_name = $row_get_tech['name'];
				$client_id = $row_get_tech['id'];
					?>                         	
        					<option value="<?php echo "$client_id"; ?>"><?php echo "$client_name"; ?></option>
      				<?php
		
			
		}

?>	
</select>