
<?php

include('./connect.php');
?>

<select name="client" id="weekend">
<?php


		$result = mysql_query("SELECT * FROM clients ORDER BY name")or die (mysql_error());		
		while($row = mysql_fetch_array($result))
		{
	
				$client_name = $row['name'];
				$client_id = $row['id'];
					?>                         	
        					<option value="<?php echo "$client_id"; ?>"><?php echo "$client_name"; ?></option>
      				<?php
		
			
		}

?>	
</select>