<select name="test" multiple><?php

include('./connect.php');

$view_clients = mysql_query("SELECT * FROM client_numbers where cid='$client_id'")or die (mysql_error());				
		while($row_v = mysql_fetch_array($view_clients))
		{

?>


  <option value="test"><?php echo $row_v[number]; ?></option>
  
  

<?php


}


?></select> Add  | Remove #