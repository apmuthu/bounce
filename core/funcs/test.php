<?php
  
  $newyear = 2009;
  $week = 0;
  $day = -04;
  $mo = 1;
  
	for ($i = 1; $i <=90; $i++)
	{

		$test =  strtotime(date("r", mktime(0, 0, 0, $mo, $day, $newyear)) . "+" . $i . " week");
		$testi = date("m/d/Y", $test);
		if(date("Y") == date("Y",$test))
		{
			
			echo $testi ."<br>";
			
		}
	}



?>