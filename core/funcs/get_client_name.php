<?php

include('./connect.php');


function get_client_name($id)
{
		$client_name_data = mysql_query("SELECT * FROM clients WHERE id='$id'")or die (mysql_error());		
		while($row = mysql_fetch_array($client_name_data))
		{
			$client_name = $row['name'];
			$client_address = $row['address'];
			$client_phone = $row['phone'];	
		}
		return($client_name);
		
}

?>