<?php
$func = $_GET['func'];
include('./auth.php');
$dates = $_GET['date'];
$techp_id = $_GET['tech'];


$mh = $dates[5].$dates[6];
$dy = $dates[8].$dates[9];
$yr = $dates[0].$dates[1].$dates[2].$dates[3];

$mh = (int)$mh;
$dy = (int)$dy;
$yr = (int)$yr;

$dates_disp = date("M dS Y", mktime(0, 0, 0, $mh, $dy, $yr));

			
			include('./funcs/get_tech_name.php');



if($auth == 1)
{
	//include('./html/menu.html');


	if($func == "view")
	{
		$lessweek = mktime(0, 0, 0, $mh, $dy-7, $yr);
		$lw = date("Y-m-d", $lessweek);
		include('./html/timesheet_view_admin.html');
	}
	if($func == null)
	{
		include('./html/timesheet_dates.html');
	}
}
else
{
	
	
	$message = "You are not authorized!";
	include('./html/message.html');
}

?>