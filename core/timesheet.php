<?php
$func = $_GET['func'];
$adminfunc = $_GET['funcs'];
$admin_tech = $_GET['tech'];
include('./auth.php');
include('./hist_back.php');
include('./funcs/safe.php');
include('./funcs/get_tech_name.php');
$tech_usrid = $tech_id;


if($admin_tech != null)
{
	$tech_usrid = (int)$admin_tech;
	$tech_name = get_tech_name($admin_tech);
	
}
//GETTING DATE from form
$dates = $_GET['date'];
$lw = date("Y-m-d", strtotime("$dates - 1 week"));


$is_valid = isvalid($dates);
$dates_disp = dateconvert($dates);
$dateend = date("Y-m-d", strtotime($dates));
//checking if date is correct

function isvalid($datenter)
{
  $datenter = strtotime($datenter);
  $datenter = date("l", $datenter);
  $datenter = strtolower($datenter);
  
  
  if($datenter == "sunday")
  {
   return "true";
  } 
  else
  {
   return "false";
  }
}

function dateconvert($datenter)
{
  $datenter = strtotime($datenter);
  $datenter2 = date("m-d-Y", $datenter);
  //$datenter = date("d", $datenter);
  $datenter1 = date('m-d-Y', strtotime('-6 day', $datenter));
  //$datenter2 = date('Y-m-d',time()+( 6 + $datenter)*24*3600);
  
  return $datenter1 . " TO " . $datenter2;

}












if($auth == 1)
{
	include('./html/menu.html');
	if($func == "add")
	{
		include('./html/timesheet_add.html');
	}
	if($func == "view")
	{

		
		if($is_valid == "true")
		{
		
		
		
		
		$ts_approval = mysql_query("SELECT * FROM timesheets_app WHERE ownerid = $tech_usrid")or die (mysql_error());
		while($ts_app = mysql_fetch_array($ts_approval))
		{
			
			if($dateend == $ts_app['dateend'])
			{
				$approval_status = $ts_app['status'];
			}
			
		}
		
		include('./html/timesheet_view.html');
		}
		else
		{
			$message = "The date is incorrect";
			include('./html/message.html');
			break;
		}
	}
	if($func == null && $dates == null)
	{
		include('./html/timesheet_dates.html');
	}
	if($func == "getview")
	{
		include('./html/timesheet_view.html');
	}
	
	//ADMIN VIEW FOR TIMESHEETS
	if($adminfunc == "adminapprove")
	{
		if($user_type != "tech")
		{
			//$test_code = "UPDATE timesheet_app SET status='Approved' WHERE dateend='$dates' AND ownerid='$tech_usrid'";
			//echo $test_code;
			$ts_app_update = mysql_query("UPDATE timesheets_app SET status='Approved' WHERE dateend='$dates' AND ownerid='$tech_usrid'")or die (mysql_error());
		
			if($ts_app_update == 1)
			{
				$message = "Timesheet Approved";
				include('./html/message.html');
			}
			else
			{
				$message = "There was a problem Approving the timesheet.";
				include('./html/message.html');
			}
			
		}
		else
		{
			$message = "You are not allowed to Approve Timesheets";
			include('./html/message.html');
		}
	}
	
	
	if($adminfunc == "View")
	{
		if($user_type != "tech")
		{
			if($is_valid == "true")
			{
		
		
		
		//checking for timesheet approval or not
		$ts_approval = mysql_query("SELECT * FROM timesheets_app WHERE ownerid = '$tech_usrid'")or die (mysql_error());
		while($ts_app = mysql_fetch_array($ts_approval))
		{
			
			if($dateend == $ts_app['dateend'])
			{
				$approval_status = $ts_app['status'];
				
			}
			
		}
		
		include('./html/timesheet_view_admin.html');
		}
		else
		{
			$message = "The date is incorrect";
			include('./html/message.html');
			break;
		}
			
			
		}
		else
		{
			$message = "You are not allowed to view this!";
			include('./html/message.html');
		}
		
	}

	
	//REST OF FUNCS
	if($func == "sendapprove")
	{
		//INSERT INTO DB FOR APPROVAL
		
		$ts_app_add = mysql_query("INSERT INTO timesheets_app (ownerid, dateend, status) VALUES ('$tech_usrid', '$dateend', 'Pending')")or die (mysql_error());
		
		if($ts_app_add == 1)
		{
			$message = "Submitted for Approval";
			
		}
		else
		{
			$message = "Sorry, there was a problem";
		}
		include('./html/message.html');
		?>
   			 <META META HTTP-EQUIV=Refresh CONTENT="1; URL=<?php echo "./timesheet.php?func=view&date=" . $dateend. ""; ?>">
    		<?php
	}
	
	

}
else
{
	
	
	$message = "You are not authorized!";
	include('./html/message.html');
}

?>