<?php

include('./auth.php');
include('./connect.php');
include('./html/menu.html');
include('./funcs/get_client_name.php');
include('./funcs/get_company_info.php');

$func = $_GET['func'];
$tech_id = $_GET['id'];
$tech_name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$account = $_POST['client'];


if($auth == 1)
{
	if($func == "del" && $user_type != "tech")
	{
		$tech_delt = mysql_query("DELETE FROM client_users WHERE id=$tech_id")or die (mysql_error());	
		$message = "The Account has been delete, no need to preserve account for data recovery.";
		include('./html/message.html');
							?>
						<META META HTTP-EQUIV=Refresh CONTENT="1; URL=client_manager.php">
						<?php
	}
	if($func == "edit")
	{
			$view_tech = mysql_query("SELECT * FROM client_users WHERE id='$tech_id'")or die (mysql_error());		
			while($row_edit = mysql_fetch_array($view_tech))
			{
				include('./html/client_view.html');
			}
	}
	if($func == "change")
	{
	
		$update_tech = mysql_query("UPDATE client_users set name='$tech_name',username='$username', email='$email', account='$account' WHERE id=$tech_id")or die (mysql_error());
		$message = "User Information Saved.";
		include('./html/message.html');
							?>
						<META META HTTP-EQUIV=Refresh CONTENT="1; URL=client_manager.php">
						<?php
	
		
	}
	if($func == "pwd")
	{
			$find_user = mysql_query("SELECT * FROM client_users WHERE id=$tech_id")or die (mysql_error());		
			while($user_row = mysql_fetch_array($find_user))
			{
				
				$new_passcode = rand(1, 100);
				$new_passcode = md5($new_passcode);
				$new_passcode = $new_passcode[1].$new_passcode[2].$new_passcode[3].$new_passcode[4].$new_passcode[5].$new_passcode[6];
				
				$n_passcode = md5($new_passcode);
				$user = $user_row['username'];
				$update_user = mysql_query("UPDATE client_users set password='$n_passcode' WHERE email='$account'")or die (mysql_error());	
				
				//returns the current URL for 
				$url = $_SERVER['REQUEST_URI']; 
				$parts = explode('/',$url);
				$actual_link = $_SERVER['SERVER_NAME'];
				for ($i = 0; $i < count($parts) - 1; $i++) {
				 $actual_link .= $parts[$i] . "/";
				}
				$actual_link = "http://" . $actual_link ."clientlogon/";
				
				$email_message = '<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<style type="text/css">
	<!--
	.style1 {font-family: Arial, Helvetica, sans-serif}
	.style2 {
		font-family: Arial, Helvetica, sans-serif;
		font-weight: bold;
		font-size: 18px;
	}
	-->
	</style>
	</head>
	
	<body>
	<p class="style2">Password Reset</p>
	<p class="style1"><strong>This is an email confirmation with ' .$user.'\'s new password: </strong>' . $new_passcode . '</p>
	<p class="style1">Please login to access your account, and change your password.</p><br>' .$actual_link .'<br>
	<p class="style1">&nbsp;</p>
	</body>
	</html>';
	$to = $user_row['email'];
	}
		
		
		$subject = 'PASSWORD RESET';
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'To: $account <'.$account.'>' . "\r\n";
		$headers .= 'From: PHPBOUNCE - SUPPORT <support@orgemail.com>' . "\r\n";
		mail($to, $subject, $email_message, $headers);
	
		
		$message = "Your password has been reset and emailed.";
		include('./html/message.html');	
	
			?>
						<META META HTTP-EQUIV=Refresh CONTENT="2; URL=client_manager.php">
						<?php
	
	}
}
else
{
	
		$message = "You are not authorized to do that";
		include('./html/message.html');
		break;
	
}

?>