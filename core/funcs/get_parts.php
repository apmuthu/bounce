<?php
include('./connect.php');
$parsts = "no";
		$parts = mysql_query("SELECT * FROM parts WHERE iid = $timid")or die (mysql_error());		
		while($row_parts = mysql_fetch_array($parts))
		{
			echo "<a href='parts_view.php?id=$row_parts[id]'>$row_parts[name]</a><br>";
		
			$parsts = "yes";
		}
		if($parsts == "no")
		{
			echo "NO PARTS";
		}
?>