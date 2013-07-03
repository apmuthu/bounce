<?php
// PARSING POST DATA

include('./auth.php');
include('./funcs/safe.php');
	
	$type = $_POST['type'];
	$name = safe($_POST['name']);
	$owner = safe($_POST['owner']);
	$address = safe($_POST['address']);
	$city = safe($_POST['city']);
	$state = safe($_POST['state']);
	$zip = safe($_POST['zip']);
	$email = safe($_POST['email']);
	$phone1 = safe($_POST['phone1']);
	$phone2 = safe($_POST['phone2']);
	$phone3 = safe($_POST['phone3']);
	$ext = safe($_POST['ext']);
	$phone = "1-$phone1-$phone2-$phone3";

// Checking auth for logged in user.



if($auth == 1)
{
	include('./html/menu.html');
	if($name == null)
	{
		
		include('./html/new_client.html');
	}	
	else
	{
	$add_client = mysql_query("INSERT INTO clients (type, name, owner, address, city, state, zip, email, phone, ext) VALUES ('$type', '$name', '$owner', '$address', '$city', '$state', '$zip', '$email', '$phone', '$ext')")or die (mysql_error());
	
	if($add_client == 1)
	{
		$name_fixed = fixsafe($name);
		$message = "Your client <strong> $name_fixed</strong> has been added to the database!";
		
		include('./html/message.html');
		
		?>
			<META META HTTP-EQUIV=Refresh CONTENT="2; URL=index.php">
		<?php
		
	}
}

}
else
{
include('./login.php');
}








		

?>