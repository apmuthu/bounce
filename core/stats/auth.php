<?php


include('./connect.php');
$username = $_COOKIE[user];
$paff = $_COOKIE[pass];

if($username != null)
{
$result = mysql_query("SELECT * FROM users WHERE username='$username'")or die (mysql_error());
		
		while($row = mysql_fetch_array($result))
		{
			$owner = $row['id'];
			if($row[password] == $paff && $row[type] != "denied")
			{
				$auth = 1;
				
				$tech_id = $row[id];
				$tech_first = $row[name];
				$datesql = date("Y-m-d");
				$date = date("m-d-Y");
				$time = date("G:i");
				$user_type = $row['type'];
				
			}
			else
			{
				$auth = 2;
			}
		}
}
		
?>
