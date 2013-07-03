<?php

include('./auth.php');
include('./connect.php');
include('./html/menu.html');

$jid = $_GET['id'];
$func = $_GET['func'];
$confirm = $_GET['confirm'];

$clientid = $_POST['client'];
$hours = $_POST['hours'];
$time = $_POST['time'];
$remote = $_POST['remote'];
$warranty = $_POST['warranty'];
$paid = $_POST['paid'];
$description = $_POST['description'];
$invoice = $_POST['invoice'];
$parts = $_POST['parts'];


include('./funcs/get_client_name.php');


if($func == "delete" && $confirm == null)
{
			$message = "Are you Sure you want to Delete this Entry    <b> <a href='./job_edit.php?id=$jid&func=delete&confirm=yes'>Yes</a>   |    <a href='./index.php'>No</a> </b>  ?";
			include('./html/message.html');
}

if($jid != null && $func == "edit")
{
	if($jid == $tech_id)
	{
	$edit = mysql_query("UPDATE timesheets  set hours='$hours', time='$time', invoice='$invoice', parts='$parts', description='$description', paid='$paid', warranty='$warranty', remote='$remote', client='$clientid' where id='$jid'")or die (mysql_error());
	$message = "Your Timesheet entry has been Updated!";
			include('./html/message.html');
			include('./funcs/hist_get.php');
	}
	else
	{
		$message = "You are not allowed to change a timesheet entry that is not yours.";
		include('./html/message.html');
	}
}

if($jid != null && $func == null)
{

		$edit = mysql_query("SELECT * FROM timesheets where id='$jid'")or die (mysql_error());		
		while($row_edit = mysql_fetch_array($edit))
		{
			$client_name = get_client_name($row_edit[client]);
			$client_id = $row_edit[client];
			
			include('./html/timesheet_edit.html');
		}


}

if($func == "delete" && $confirm == "yes")
{
		$delete = mysql_query("DELETE FROM timesheets where id='$jid'")or die (mysql_error());
		$message = "Your Timesheet entry has been DELETED!";
			include('./html/message.html');
			include('./funcs/hist_get.php');
}


?>