<?php
include('./auth.php');
include('./menu.php');

$func = $_GET['do'];
$mo = $_GET['mo'];
$yr = $_GET['yr'];

$month_start = $yr."-".$mo."-01";
$month_end = $yr."-".$mo."-31";

if($auth == 1)
{
	if($func == null)
	{
		$this_mo = date("m");
		$this_yr = date("Y");
		$last_mo = date("m", strtotime("last month"));
		
		include('./html/choose_report.html');
	}
	if($func != null)
	{
	
		include('activity_report_month.php');
	}
}
?>