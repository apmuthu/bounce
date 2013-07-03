<?php
//include('../connect.php');
	$ttl = mysql_query("SELECT * FROM timesheets WHERE daterec >= '2007-08-00'")or die (mysql_error());
				
		while($row = mysql_fetch_array($ttl))
		{
			$total = $total + $row[hours];
		}

//echo "TOTAL:" .($total * 80);
?>