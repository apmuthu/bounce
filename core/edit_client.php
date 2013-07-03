<?php

include('./auth.php');
include('./html/menu.html');
include('./funcs/safe.php');

	$cid = $_GET['id'];
	$func = $_GET['func'];
	
	
	$type = $_POST['type'];
	$name = safe($_POST['name']);
	$owner = safe($_POST['owner']);
	$address = safe($_POST['address']);
	$city = safe($_POST['city']);
	$state = safe($_POST['state']);
	$zip = safe($_POST['zip']);
	$email = safe($_POST['email']);
	$phone = safe($_POST['phone']);
	
	
	if($auth == 1 & $user_type != "tech")
	{
		if($func == null)
		{
			$view = mysql_query("SELECT * FROM clients where id='$cid'")or die (mysql_error());		
			while($row_view = mysql_fetch_array($view))
			{
				
				include('./html/edit_client.html');
			}			
		}
		if($func == "update")
		{
			$update = mysql_query("UPDATE clients set type='$type', name='$name', address='$address', phone='$phone', owner='$owner', city='$city', state='$state', zip='$zip', email='$email' where id='$cid'")or die (mysql_error());
				$message = "The client has been updated";
				include('./html/message.html');
									?>
					<META META HTTP-EQUIV=Refresh CONTENT="1; URL=clients.php">
					<?php
		}
			
	
		
	}
	else
	{
		$message = "You are not authorized to make changes.";
		include('./html/message.html');
	}
?>