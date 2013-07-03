<?php
include('./auth.php');
include('./connect.php');

$new_pass = $_POST['pass'];
$passd5 = md5($new_pass);

if($auth == 1)
{
	include('./html/menu.html');
	if($new_pass != null)
	{
		$pass_reset = mysql_query("UPDATE users set password='$passd5' WHERE id='$tech_id'")or die (mysql_error());
		$message = "Your password has been reset!";
	}
	else
	{
		include('./html/pass_change.html');
		
	}	
	
}
else
{
	$message = "You are not authorized to change this password!";
	
}

if($message != null)
{
	include('./html/message.html');
}



?>