<?php

include('./auth.php');
include('./funcs/safe.php');

$func = $_GET['func'];
$tid = $_GET['id'];
$notes = safe($_POST['notes']);
$status = $_GET['status'];
$page = $_GET['page'];


if($func == "notes")
{
	include('./html/update_notes.html');
}
if($func == "owner")
{
	$update_owner = mysql_query("UPDATE tickets set ownerid='$tech_id' WHERE id=$tid")or die (mysql_error());
		$message = "You are now the owner of this task!";
		include('./html/message.html');
}
if($func == "update")
{
	
	$dt = date("Y-m-d H:i:s");
	$sqltime = date("H:i:s");
	
	
	$update_notes = mysql_query("INSERT INTO ticket_notes (notes, ticket_id, tech_name, dtime, time) VALUES ('$notes', '$tid' ,'$tech_first', '$dt', '$sqltime')")or die (mysql_error());
	$message = "Your notes have been added!";
	include('./html/message.html');
	
}

if($func == "statusupdate")
{
	
	
	$update_notes = mysql_query("UPDATE tickets set status='$status' WHERE id='$tid'");
	
	$message = "Your Ticket<b> $tid </b>has been updated to <b>$status</b>.";
	include('./html/message.html');
	
	if($page != null)
	{
		?>
    <META META HTTP-EQUIV=Refresh CONTENT="1; URL=<?php echo "$page"; ?>">
    <?php
	}
	if($page == null)
	{
	?>
    <META META HTTP-EQUIV=Refresh CONTENT="1; URL=view_tickets.php?func=ticket&id=<?php echo "$tid"; ?>">
    <?php
	}
	
}
if($func == "clear")
{
	

	
	$update_notes = mysql_query("DELETE from tickets WHERE id='$tid'");	
	$message = "Your Ticket<b> $tid </b>has been Cleared from the queue.";
	include('../html/message.html');
	
	if($page != null)
	{
		?>
    <META META HTTP-EQUIV=Refresh CONTENT="1; URL=<?php echo "$page"; ?>">
    <?php
	}
	if($page == null)
	{
	?>
    <META META HTTP-EQUIV=Refresh CONTENT="1; URL=view_tickets.php?func=ticket&id=<?php echo "$tid"; ?>">
    <?php
	}
	
}

?>