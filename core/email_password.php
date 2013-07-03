<?php
include('./connect.php');


$account = $_POST['email'];

if($account != null)
{
	
		$find_user = mysql_query("SELECT * FROM users WHERE email='$account'")or die (mysql_error());		
		while($user_row = mysql_fetch_array($find_user))
		{
			
			$new_passcode = rand(1, 100);
			$new_passcode = md5($new_passcode);
			$new_passcode = $new_passcode[1].$new_passcode[2].$new_passcode[3].$new_passcode[4].$new_passcode[5].$new_passcode[6];
			
			$n_passcode = md5($new_passcode);
			$update_user = mysql_query("UPDATE users set password='$n_passcode' WHERE email='$account'")or die (mysql_error());	
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
<p class="style1"><strong>This is an email confirmation with your new password: </strong>' . $new_passcode . '</p>
<p class="style1">Please login to access your account, and change your password.</p>
<p class="style1">&nbsp;</p>
</body>
</html>';
$send_message = "yes";
		}

	
	
	
	
}
else
{
	include('./html/email_pass.html');
}


if($send_message == "yes")
{
	$to = $account;
	
	$subject = 'PASSWORD RESET';
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To: $account <'.$account.'>' . "\r\n";
	$headers .= 'From: PHPBounce - SUPPORT <support@orgname>' . "\r\n";
	mail($to, $subject, $email_message, $headers);
	
	$message = "Your password has been reset and emailed to you.";
	include('./html/message.html');	
		?>
					<META META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
					<?php

}
else
{

}


			







?>