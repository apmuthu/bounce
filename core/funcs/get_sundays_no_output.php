<?php

include('./connect.php');
include('auth.php');

		$result = mysql_query("SELECT * FROM timesheets")or die (mysql_error());		
		while($row = mysql_fetch_array($result))
		{
			$my_date = $row['daterec'];
			#$my_date = $datesql;
			
			$mh = intval($my_date[5].$my_date[6]);
			$dy = intval($my_date[8].$my_date[9]);
			$yr = intval($my_date[0].$my_date[1].$my_date[2].$my_date[3]);
			
			
			if($my_date != null);
			{
				$found = getDayOfWeek($dy, $mh, $yr);
				if($found == 5)
				{
					
					$plusweek = mktime(0, 0, 0, $mh, $dy+8, $yr);
					$dates = date("Y-m-d", $plusweek);
					
					$lw = $my_date;
				}
			}
			
			
		}

include('./html/timesheet_this_week.html');










function getDayOfWeek($day, $month, $year, $calendarSystem = 1) 
{ 
    # Check for valid parameters # 
    if (!is_int($day) || $day < 1 || $day > 31) 
    { 
        printf('Wrong parameter for $day. It must be an integer between 1 and 31.'); 
        exit(); 
    } 
        
    if (!is_int($month) || $month < 1 || $month > 12) 
    { 
        printf('Wrong parameter for $month. It must be an integer between 1 and 12.'); 
        exit(); 
    } 
        
    if (!is_int($year) || $year < 0) 
    { 
        printf('Wrong parameter for $year. It must be a positive integer.'); 
        exit(); 
    } 
        
    if (!checkdate($month, $day, $year)) 
    { 
        printf('Invalid date.'); 
        exit(); 
    } 
        
    # Algorithm #        
    if ($month < 3) 
    { 
        $month = $month + 12; 
        $year = $year - 1; 
    } 
        
    return ($day + (2 * $month) + (int) (6 * ($month + 1) / 10) + $year + (int) ($year / 4) - (int) ($year / 100) + (int) ($year / 400) + $calendarSystem) % 7; 
} 


?>	
