<?php
include('./connect.php');
include('./auth.php');
include('./html/menu.html');
if($user_type != 'tech')
{
	include('./html/techs_mgr.html');
}
else
{
	$message = "Must have and  &nbsp;<b><font color='red'><u>admin</u> </font><font color='black'>&nbsp;or&nbsp;</font> <font color='red'> <u>manager</u></font></b> &nbsp;  account to make changes.";
	include('./html/message.html');
}






?>