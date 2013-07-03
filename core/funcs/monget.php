<?php


function getMondays($year) {
  $newyear = $year;
  $week = 0;
  $day = 0;
  $mo = 1;
  $mondays = array();
  $i = 1;
  while ($week != 1) 
  {
   		$day++;
   		$week = date("w", mktime(0, 0, 0, $mo,$day, $year));
  }
  
  
  array_push($mondays,date("r", mktime(0, 0, 0, $mo,$day, $year)));
  
  
  while ($newyear == $year) 
  {
	   $test =  strtotime(date("r", mktime(0, 0, 0, $mo,$day, $year)) . "+" . $i . " week");
	   $i++;
	   if ($year == date("Y",$test)) 
	   {
   			  array_push($mondays,date("r", $test));
   	   }
		
  		$newyear = date("Y",$test);
  }
  
  
  
  return $mondays;
}
echo '<pre>';
print_r(getMondays('2009'));
echo '</pre>';


?>

