<?php


include('./connect.php');
include('../funcs/get_client_name.php');
$username = $_COOKIE[user];
$paff = $_COOKIE[pass];

if($username != null)
{
$result = mysql_query("SELECT * FROM client_users WHERE username='$username'")or die (mysql_error());
		
		while($rowj = mysql_fetch_array($result))
		{
			$owner = $rowjj['id'];
			if($rowj[password] == $paff && $rowj[type] != "denied")
			{
				$auth = 1;
				
				$tech_id = $rowj[id];
				$client_name = $rowj[name];
				$datesql = date("Y-m-d");
				$date = date("m-d-Y");
				$time = date("G:i");
				$user_type = $rowj['type'];
				$my_id = $rowj['account'];
				$my_id_name = get_client_name($my_id);
				
			}
			else
			{
				$auth = 2;
			}
		}
}
		
?>
