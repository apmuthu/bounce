<?php
include('./auth.php');
include('./html/menu.html');
include('./connect.php');
include('./funcs/safe.php');


$func = $_GET['func'];
$client_id = safe($_POST['client']);
$owner_ch = safe($_POST['owner']);
$subject = safe($_POST['subject']);
$description = safe($_POST['description']);
$notes = safe($_POST['notes']);
$time_stp = date("H:i:s");





if($func == null)
{
	include('./html/new_tickets.html');
}



if($func == "new")
{
	$token = rand(1,10000).date(Ymd);
	if($owner_ch == "yes")
	{
		$owner_id = $tech_id;
	}
	else
	{
		$owner_id = 0;
	}
	
	
	$new_ticket = mysql_query("INSERT INTO tickets (token, client_id, date_start, name, ownerid, notes, status) VALUES ('$token', '$client_id', '$datesql', '$subject', '$owner_id', '$description', 'Open')")or die (mysql_error()); 
	
		$find_ticket = mysql_query("SELECT * FROM tickets where token='$token'")or die (mysql_error());		
		while($row = mysql_fetch_array($find_ticket))
		{
			$ticket_id = $row['id'];	
		}
	
		$notes = mysql_query("INSERT INTO ticket_notes (ticket_id, notes, dtime, time) VALUES ('$ticket_id', '$notes', '$datesql', '$time_stp')"); 
		
		?>
    <META META HTTP-EQUIV=Refresh CONTENT="1; URL=view_tickets.php?func=ticket&id=<?php echo "$ticket_id"; ?>">
    <?php
	
	$message = "Your ticket $ticket_id has been created";
	include('./html/message.html');

}