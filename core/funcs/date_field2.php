
<select name="month" id="month">
<option value="<?php echo date("m"); ?>" selected="selected"><?php echo date("m"); ?></option>
<?php
for($month = 1; $month <=12; $month++)
{

	if($month < 10)
	{
		$month = "0".$month;
	}
	?>
    <option value="<?php echo "$month"; ?>"><?php echo "$month"; ?></option>
    <?php	
}

?>
</select>
<select name="day" id="day">
<option value="<?php echo date("d"); ?>" selected="selected"><?php echo date("d"); ?></option>
<?php
for($dayg = 1; $dayg <=31; $dayg++)
{
	
	if($dayg < 10)
	{
		$day = "0".$dayg;
		
	}
	else
	{
	
		$day = $dayg;
	}
	
		
	?>
    	
    <option value="<?php echo "$day"; ?>"><?php echo "$day"; ?></option>
    <?php
	
	
}
?>

</select>
<select name="year" id="year">
<option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
<option value="<?php echo date("Y")-1; ?>"><?php echo date("Y")-1; ?></option>
<option value="<?php echo date("Y")+1; ?>"><?php echo date("Y")+1; ?></option></select>



