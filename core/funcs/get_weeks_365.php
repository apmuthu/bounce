<select name="date">
<?php
 	
	
	if(date('w') == 1)
	{
		$wstart_date = date("Y-m-d");
		
	}
	else
	{
		$wstart_date = date('Y-m-d',time()+( 1 - date('w'))*24*3600);
	}
	
//GETTING WEEKS FOR THE LAST 90 DAYS
for ($x = 1; $x >= -370; $x = $x -7)
{
	echo "<br><br>";
	$h = -$x;
	$y = $x + 6;
	$wstart_date = date('Y-m-d',time()+( $x - date('w'))*24*3600);
	$wstart_date_view = date('m-d-Y',time()+( $x - date('w'))*24*3600);
	$wend_date = date('Y-m-d',time()+( $y - date('w'))*24*3600);
	$wend_date_view = date('m-d-Y',time()+( $y - date('w'))*24*3600);
	
	//echo "START OF WEEK:" .$wstart_date . "<br>";
	//echo "END OF WEEK:" . $wend_date;

 
			?>
			<option value="<?php echo $wend_date; ?>"><?php echo $wstart_date_view . " to " . $wend_date_view; ?></option>
			<?php
}
?>
</select>
