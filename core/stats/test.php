<?php 
include('../connect.php');



$d = mnth_gt(08);

echo "Month:". $d;




function mnth_gt($gt_month)
{
	
include('./connect.php');
include('./auth.php');
	
	$this_mo = "$gt_month";	
	$this_yr = date("Y")-1;
	
	
		
$endmonth = $this_yr."-"."0".$this_mo."-31";
$begmonth = $this_yr."-"."0".$this_mo."-00";



$total_hours = 0;

		$qry = "SELECT * FROM timesheets WHERE techid = $tech_id AND daterec >= '$begmonth'  AND daterec <= '$endmonth' ORDER BY daterec ";
		$weekly = mysql_query($qry)or die (mysql_error());		
		while($row = mysql_fetch_array($weekly))
		{
			$total_hours = $total_hours + $row['hours'];
		}
		echo $qry;
		return($total_hours);
}

?>