<?php
include('./auth.php');
include('./connect.php');
include('./funcs/safe.php');

$clientid = $_POST['client'];
$hours = safe($_POST['hours']);
$time = safe($_POST['time']);
$remote = safe($_POST['remote']);
$warranty = safe($_POST['warranty']);
$paid = safe($_POST['paid']);

$description = safe($_POST['description']);
$invoice = safe($_POST['invoice']);
$parts = safe($_POST['parts']);
$day = safe($_POST['day']);
$month = safe($_POST['month']);
$year = safe($_POST['year']);

$dates = $year."-".$month."-".$day;







if($auth == 1)
{
	include('./html/menu.html');
	$add_client = mysql_query("INSERT INTO timesheets (techid, client, hours, description, invoice, parts, daterec, time, remote, warranty, paid) VALUES ('$tech_id', '$clientid', '$hours', '$description', '$invoice', '$parts', '$dates', '$time', '$remote', '$warranty', '$paid')")or die (mysql_error());
	
	if($add_client == 1)
	{
		$message = "Your hours have been added!";
		include('./html/message.html');
		
		include('./funcs/hist_get.php');
				
	}
}

?>