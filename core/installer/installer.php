<?php
include('../funcs/safe.php');

$sql_server = $_POST['hostname'];
$username = $_POST['username'];
$password = $_POST['password'];
$dbname = $_POST['database'];



echo "starting ... <br><br>";
	//DATABASE CONNECTION INFO FOR INSTALLER

	//MySQL Server location
		$host = $sql_server;
	//MySQL Database User
		$hostuser = $username;
	//MySQL Database User Password
		$userpass = $password;	
	//Database used
		$dbname = $dbname;

	



//CONFIG INFORMATION FOR CONNECT.PHP file
$connect_file = '<?php

	
	//MySQL Server location
		$host = "'.$sql_server.'";
	//MySQL Database User
		$hostuser = "'.$username.'";
	//MySQL Database User Password
		$userpass = "'.$password.'";	
	//Database used
		$dbname = "'.$dbname.'";

	$db = mysql_connect("$host", "$hostuser", "$userpass")or die ("ERROR 201: Can\'t Connect to the database<br><br> 1. Check if MySQL is running... <br><br> 2. Check the connection file <br><br> 3. Restart the webserver if you can.");
	mysql_select_db("$dbname", $db)or die ("ERROR 202: DB NOT FOUND!");

?>';

//OPEN CONFIG FILE TO WRITE CONFIG
echo "<br>Writing Configuration file . . . . ";
// CHECKING IF connect.php file is emtpy. If not empty it will not continue and error will display.
if (0 != filesize("../connect.php"))
{
 die("<font color='red'>ERROR:</font> The <font color='blue'>connect.php</font> file is not emtpy. Please remove all text inside, save, and apply full read write access to the file");
}
else
{

	$fh = fopen("../connect.php", "r+");
	if($fh == false)
		die("ERROR: Unable to write to file connect.php,<br> Check permissions for that file. (Windows set user access to read /write) (linux chmod 0777)<br><br>");
	
	



	fwrite($fh, $connect_file);
	$closed = fclose($fh);
	if ($closed == true)
	{
		echo "<font color=\"red\">Done</font>";
	}
}
//CLOSED FILE FOR CONNECT.PHP


//CONNECTING TO DATABSE
echo "<br>Connecting to Database . . . . ";

$db = mysql_connect("$host", "$hostuser", "$userpass")or die ("ERROR 201: Can\'t Connect to the database<br><br> 1. Check if MySQL is running... <br><br> 2. Check your settings on the previous page");
	mysql_select_db("$dbname", $db)or die ("ERROR 202: DB NOT FOUND!");
$org = safe($_POST['orgname']);
$phone = safe($_POST['phone']);
$address = safe($_POST['address']);
$city = safe($_POST['city']);
$state = safe($_POST['state']);
$country = safe($_POST['country']);
$tax = safe($_POST['tax']);
$zip = safe($_POST['zip']);
$goog_id = safe($_POST['merchantid']);
$goog_key = safe($_POST['merchantkey']);

$adminemail = $_POST['email'];
echo "<font color=\"red\">Done</font>";




echo "<br>Creating Tables . . . . ";
$tables = array();

$tables[0] = "CREATE TABLE IF NOT EXISTS clients (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `type` varchar(100) NOT NULL default '',
  `address` varchar(100) NOT NULL default '',
  `phone` varchar(100) NOT NULL default '',
  `owner` varchar(66) NOT NULL default '',
  `techid` bigint(20) NOT NULL default '0',
  `city` varchar(66) NOT NULL default '',
  `state` varchar(66) NOT NULL default '',
  `zip` varchar(66) NOT NULL default '',
  `email` varchar(66) NOT NULL default '',
  `ext` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";


$tables[1] = "CREATE TABLE IF NOT EXISTS client_numbers (
  `id` bigint(11) NOT NULL auto_increment,
  `cid` varchar(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";

$tables[2] = "CREATE TABLE IF NOT EXISTS client_users (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(66) NOT NULL default '',
  `username` varchar(66) NOT NULL default '',
  `password` varchar(66) NOT NULL default '',
  `email` varchar(66) NOT NULL default '',
  `name` varchar(66) NOT NULL default '',
  `hist` varchar(100) NOT NULL default '',
  `account` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";

$tables[3] = "CREATE TABLE IF NOT EXISTS company (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(66) NOT NULL,
  `phone` varchar(66) NOT NULL,
  `address` varchar(66) NOT NULL,
  `city` varchar(66) NOT NULL,
  `state` varchar(66) NOT NULL,
  `gmerchantid` varchar(66) NOT NULL,
  `gmerchantkey` varchar(66) NOT NULL,
  `country` varchar(66) NOT NULL,
  `zip` varchar(66) NOT NULL,
  `tax` float NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";

$tables[4] = "CREATE TABLE IF NOT EXISTS invoice (
  `id` bigint(11) NOT NULL auto_increment,
  `client` bigint(11) NOT NULL DEFAULT '0',
  `token` bigint(11) NOT NULL,
  `invdate` date NOT NULL,
  `paid` int(2) NOT NULL DEFAULT '0',
  `paiddate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";

$tables[5] = "CREATE TABLE IF NOT EXISTS invoice_items (
  `id` bigint(11) NOT NULL auto_increment,
  `invoice` bigint(11) NOT NULL default '0',
  `item` varchar(66) NOT NULL default '',
  `description` text NOT NULL ,
  `qty` float NOT NULL default '0',
  `price` double NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$tables[6] = "CREATE TABLE IF NOT EXISTS parts (
  `id` bigint(11) NOT NULL auto_increment,
  `iid` bigint(11) NOT NULL,
  `name` varchar(66) NOT NULL,
  `cost` varchar(66) NOT NULL,
  `sale` varchar(66) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$tables[7] = "CREATE TABLE IF NOT EXISTS `task` (
  `id` bigint(100) NOT NULL auto_increment,
  `owner` int(10) NOT NULL default '0',
  `name` varchar(66) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  `date2` date NOT NULL default '0000-00-00',
  `comments` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

$tables[8] = "CREATE TABLE IF NOT EXISTS `tickets` (
  `id` bigint(11) NOT NULL auto_increment,
  `token` varchar(100) NOT NULL default '',
  `client_id` bigint(11) NOT NULL default '0',
  `date_start` date NOT NULL default '0000-00-00',
  `date_stop` date NOT NULL default '0000-00-00',
  `name` varchar(66) NOT NULL default '',
  `ownerid` bigint(11) NOT NULL default '0',
  `notes` text NOT NULL,
  `status` varchar(66) NOT NULL default '',
  `priority` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$tables[9] = "CREATE TABLE IF NOT EXISTS `ticket_notes` (
  `id` bigint(11) NOT NULL auto_increment,
  `ticket_id` bigint(11) NOT NULL,
  `notes` text NOT NULL,
  `tech_name` varchar(66) NOT NULL default '',
  `dtime` date NOT NULL default '00:00:00' ,
  `time` varchar(11) NOT NULL ,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$tables[10] = "CREATE TABLE IF NOT EXISTS `timesheets` (
  `id` bigint(11) NOT NULL auto_increment,
  `aprid` bigint(11) NOT NULL default '0',
  `techid` bigint(11) NOT NULL,
  `client` varchar(66) NOT NULL default '',
  `hours` varchar(66) NOT NULL default '',
  `description` text NOT NULL,
  `invoice` varchar(66) NOT NULL default '',
  `parts` varchar(66) NOT NULL default '',
  `daterec` date NOT NULL default '0000-00-00',
  `time` varchar(66) NOT NULL default '',
  `warranty` varchar(66) NOT NULL default '',
  `paid` varchar(66) NOT NULL default '',
  `remote` varchar(66) NOT NULL default '',
  `approval` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$tables[11] = "CREATE TABLE IF NOT EXISTS `timesheets_app` (
  `id` bigint(11) NOT NULL auto_increment,
  `dateend` date NOT NULL default '0000-00-00',
  `ownerid` int(11) NOT NULL default '0',
  `mgrid` int(11) NOT NULL default '0',
  `status` varchar(66) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$tables[12] = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(66) NOT NULL,
  `username` varchar(66) NOT NULL default '',
  `password` varchar(66) NOT NULL default '',
  `email` varchar(66) NOT NULL default '',
  `sms` varchar(100) NOT NULL default '',
  `name` varchar(66) NOT NULL default '',
  `hist` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
	

	


// Insert into DATABASE
	
	
	for ($x=0; $x <= (sizeof($tables)+1); $x++)
	{
		if($tables[$x] != null)
		{
		mysql_query($tables[$x])or die (mysql_error());
		
		}
		else
		{
			break;
		}
	}
	echo "<font color=\"red\">Done</font>";
	
	//INSERT DATA FROM FORM INTO COMPANY AND USERS FOR FIRST ADMIN ACCOUNT
echo "<br>Inserting Data . . . . ";

$company_sql = "INSERT INTO company (name, phone, address, city, state, country, zip, tax, gmerchantid, gmerchantkey) VALUES ('$org', '$phone', '$address', '$city', '$state', '$country', '$zip', '$tax', '$goog_id', '$goog_key')";
$users_sql = "INSERT INTO users (type, username, password, email, sms, name, hist) VALUES ('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '$adminemail', '', 'Administrator', '')";


		mysql_query($company_sql)or die (mysql_error());
		mysql_query($users_sql)or die (mysql_error());

	echo "<font color=\"red\">Done</font>";
	
	
	
	
	
	echo "<br><br><br><font color='red'>Installation complete:</font> click <a href='../'>here</a> to login (Username: admin | Password: admin)<br><br> <br><br>MAKE SURE YOU DELETE THE INSTALLER FOLDER ON YOUR SERVER !!!<BR><BR>";


?>