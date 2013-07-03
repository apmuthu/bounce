<?php
$client_id = $_GET['id'];
include('./connect.php');
include('./auth.php');
if($auth == 1)
{
include('./html/menu.html');


		$view_clients = mysql_query("SELECT * FROM clients where id='$client_id'")or die (mysql_error());				
		while($row = mysql_fetch_array($view_clients))
		{
			$map_address = str_replace(" ", "+", $row[address])." ".$row[zip];
			
			include('./html/view_client.html');		
		}
}
else
{
	$message = "Your are not authorized to view this page!";
	include('./html/message.html');
	
}	

?>