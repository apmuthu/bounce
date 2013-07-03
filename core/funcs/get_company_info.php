<?php
include('./connect.php');

		$client_name_data = mysql_query("SELECT * FROM company")or die (mysql_error());		
		while($row = mysql_fetch_array($client_name_data))
		{
			$org_name = $row['name'];
			$org_address = $row['address'];
			$org_phone = $row['phone'];	
			$org_tax = $row['tax'];
			$org_country = $row['country'];
			$org_city = $row['city'];
			$org_zip = $row['zip'];
			$org_state = $row['state'];
			$goog_id = $row['gmerchantid'];
			$goog_key = $row['gmerchantkey'];
			
		}	


?>