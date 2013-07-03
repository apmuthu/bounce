<?php

include('./connect.php');
include('./auth.php');

	$this_mo = date("m");	
	$this_yr = date("Y");
	
	
		
$endmonth = $this_yr."-".$this_mo."-31";
$begmonth = $this_yr."-".$this_mo."-01";



$total_hours = 0;

		$weekly = mysql_query("SELECT * FROM timesheets WHERE techid = $tech_id AND daterec <= '$endmonth'  AND daterec >= '$begmonth' ORDER BY daterec")or die (mysql_error());		
		while($row = mysql_fetch_array($weekly))
		{
			$total_hours = $total_hours + $row['hours'];
		}


echo "$total_hours";
?>	
