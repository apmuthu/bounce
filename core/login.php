<?php
include('./connect.php');
include('./funcs/safe.php');

$userget = safe($_POST['email']);
$passgetg = safe($_POST['password']);

$passgetg = md5($passgetg);
$dop = $_GET['do'];

//include('./html/top.html');

if($userget == null || $passgetg == null)
{
	$dop = null;
}

if($dop == null)
{
	
	include('./index.html');

}

else
{
	
		
		$result = mysql_query("SELECT * FROM users WHERE username='$userget'")or die (mysql_error());		
		while($row = mysql_fetch_array($result))
		{

				if($row[password] == $passgetg)
				{
					
					setcookie("user", $userget, time()+36000); 
					setcookie("userid", $row[id], time()+36000); 
					setcookie("pass", $passgetg, time()+36000);
						
					
					//$message = "You have logged in sucessfully!";
						include('./html/please_wait.html');
					
					?>
					<META META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
					<?php
					$pre = 1;
					break;
				}
				else
				{
					$pre = 1;
						$message = "I was not able to log you in...";							
						include('./html/message.html');
						break;
						

				}
				
				


	
		}
		if($row[username] == null && $pre != 1)
		{
			
			 $message = "Your username</b> $userget <b>does not exist!";
			 include('./html/message.html');
			 
		}
	
	
	
	
	
	
	
	
	
	
}


//include('./html/bot.html');
?>