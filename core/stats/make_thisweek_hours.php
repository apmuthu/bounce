<?php

include('./connect.php');
include('./auth.php');

$from_dt = date("Y-m-d", strtotime("last monday"));
$to_dt = date("Y-m-d", strtotime("next sunday"));

$total_hours = 0;

		$weekly = mysql_query("SELECT * FROM timesheets WHERE techid = $tech_id AND daterec <= '$to_dt'  AND daterec > '$from_dt' ORDER BY daterec")or die (mysql_error());		
		while($row = mysql_fetch_array($weekly))
		{
			$total_hours = $total_hours + $row['hours'];
		}


echo "$total_hours";

?>	
