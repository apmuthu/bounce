<?php
include('./auth.php');
include('./html/main.css');

if($auth == 1)
{
	include('./menu.php');
	include('./html/welcome.html');
	
}

else
{
	include('./html/login.html');
}

?>