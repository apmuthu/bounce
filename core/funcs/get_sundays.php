<select name="date">
<?php
  
  $newyear = 2009;
  $week = 0;
  $day = -04;
  $mo = 1;
  
	for ($i = 1; $i <=90; $i++)
	{

		$test =  strtotime(date("r", mktime(0, 0, 0, $mo, $day, $newyear)) . "+" . $i . " week");
		$testi = date("M dS Y", $test);
		$testi_sql = date("Y-m-d", $test);
		if(date("Y") == date("Y",$test))
		{
			?>
			<option value="<?php echo "$testi_sql"; ?>"><?php echo "$testi"; ?></option>
			<?php
			
		}
	}



?>
</select>
