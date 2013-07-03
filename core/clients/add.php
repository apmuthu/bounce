<?php
include('./connect.php');
include('./auth.php');
include('../funcs/get_client_name.php');
include('../funcs/safe.php');

$func = $_GET['func'];
$client_id = $_GET['id'];
$subject = safe($_POST['subject']);
$description = safe($_POST['description']);
$name = $_POST['name'];
$priority = $_POST['priority'];
$phone  = $_POST['phone'];
$notes = "Please call Name:".$name." /  Phone:".$phone;
$datesql = date("Y-m-d");





		$get_tech = mysql_query("SELECT * FROM clients where id='$client_id'")or die (mysql_error());		
		while($row_tech_get = mysql_fetch_array($get_tech))
		{
			$owner_id = $row_tech_get['techid'];
			$phone_client = $row_tech_get['phone'];
		}



if($func == null)
{
	include('./html/new.html');
}



if($func == "new")
{
	$token = rand(1,100000).date(Ymd);
		
	if($subject == null)
	{
		$subject = "BLANK";
	}
	$new_ticket = mysql_query("INSERT INTO tickets (token, client_id, date_start, name, ownerid, notes, status, priority) VALUES ('$token', '$client_id', '$datesql', '$subject', '$owner_id', '$description', 'Open', '$priority')")or die (mysql_error()); 
	
		$find_ticket = mysql_query("SELECT * FROM tickets where token='$token'")or die (mysql_error());		
		while($row = mysql_fetch_array($find_ticket))
		{
			$ticket_id = $row['id'];
				
		}
	$notes = mysql_query("INSERT INTO ticket_notes (ticket_id, notes, dtime) VALUES ('$ticket_id', '$notes', '$datesql')"); 
	
	
	
	

}


// EMAIL FUNCTION
		$get_email = mysql_query("SELECT * FROM users where id='$owner_id'")or die (mysql_error());		
		while($row_tech_email = mysql_fetch_array($get_email))
		{
			$to = $row_tech_email['email'];
			$to_sms = $row_tech_email['sms'];
		}
		$client_name = get_client_name($client_id);
		if($owner_id == null)
		{
			$to = "";
		}
	
	


	$subject_m = 'NEW TICKET NOTIFICATION';
	$subject_mms = "";
	include('./html/email_msg.html');
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To: $to <'.$to.'>' . "\r\n";
	$headers .= 'From: PHPBounce <'.$to.'>' . "\r\n";
	mail($to, $subject_m, $email_message, $headers);
	
	//SMS FUNCTION
	
	//$subject = 'NEW TICKET NOTIFICATION';
	//$email_message = "You have a new Ticket from $client_name";
	//mail($to_sms, $subject_mms, $email_message);

include('./html/yourticket.html');

?>