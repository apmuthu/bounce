<?php
include('./auth.php');

if($auth == 1)
{

	
	include('./html/menu.html');
	include('./html/updates.html');
	include('./html/stats.html');
}
else
{
	include('./login.php');
}

?>
