<select name="date" id="month">

<?php

$first_sun = get_first_sun();
			$mhg = intval($first_sun[5].$first_sun[6]);
			$dyg = intval($first_sun[8].$first_sun[9])-1;
			$yrg = intval($first_sun[0].$first_sun[1].$first_sun[2].$first_sun[3]);
for($mth = 0; $mth <= 53; $mth++)
{
	
		
	
	
	if($first_sun != null);
	{
			
		if($dyg >= 1)
		{
			         
					 ?>
                     
                     <option value="<?php echo "$first_sun"; ?>"><?php echo "$mhg/$dyg/$yrg"; ?></option>
                     
                     <?php              	
        			
                    
       	}       
                $addweek = mktime(0, 0, 0, $mhg, $dyg+7, $yrg);
				$first_sun = date("Y-m-d", $addweek);
				$mhg = intval($first_sun[5].$first_sun[6]);
			$dyg = intval($first_sun[8].$first_sun[9]);
			$yrg = intval($first_sun[0].$first_sun[1].$first_sun[2].$first_sun[3]);

	}

}
function get_first_sun()
{	
	for ($day = 1; $day <= 31; $day++)
	{
		
		$yr1 = intval(date("Y"));
		$mh1 = 1;
		$dy1 = $day;
		
		$my_dater = $yr1."-".$mh1."-".$dy1;
		
		

				$found = getDayOfWeek($dy1, $mh1, $yr1);
				if($found == 0)
				{
					return($my_dater);
				}
				
	

			
			
	}

}


	


?>




<?php




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
</select>