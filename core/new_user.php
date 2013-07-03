<?php

	include('./connect.php');	
	include('./auth.php');
	include('./funcs/safe.php');
	
	if($auth == 1)
	{
		include('./html/menu.html');
	// GETTING VARIABLES
	
	$page = $_GET['page'];
	$name = safe($_POST['name']);
	$email = safe($_POST['email']);
	$username = safe($_POST['username']);
	$password = safe($_POST['password']);
	$new_user_type = safe($_POST['type']);
	$password_crypt = md5($password);
	
	
	
	
	
	
	
	//FUNCTIONS
	function checkuser($email)
	{
		$result = mysql_query("SELECT * FROM users WHERE email='$email'")or die (mysql_error());		
		while($row = mysql_fetch_array($result))
		{
			if($row['email'] == $email)
			{
				$used = "no";	
						
			}
			else
			{
				$used == "yes";
				
			}
	
		}
		return($used);
	}
	
	
	
	
	
	
	
	
	
	// EXECUTION
	
	
	
	if($page == null)
	{
		include('./html/new_user.html');
		
	}
	else
	{
		
		$make = "yes";
		$message = "MAKE = $make";
		
		if($make == "yes")
		{
		
		$sql = "INSERT into users (username, password, email, name, type) VALUES ('$username', '$password_crypt', '$email', '$name', '$new_user_type') ";
		$add_result = mysql_query($sql)or die (mysql_error());	
		$message = "Made the user!";
		include('./html/message.html');
					?>
					<META META HTTP-EQUIV=Refresh CONTENT="2; URL=tech_manager.php">
					<?php
		
		
		}
		else
		{
			$message = "Didn't make the user!";
			include('./html/message.html');
		}
		
	}
	
	
	
	

	
	}
	else
	{
		$message = "you are not logged in!";
		include('./html/message.html');
	}



?>