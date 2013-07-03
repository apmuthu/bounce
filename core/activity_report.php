<?php
echo "<title>Monthly Activity Report</title>";
$func = $_GET['func'];
include('./auth.php');
include('./hist_back.php');

$month = $_POST['month'];
$year = $_POST['year'];
$client_id = $_POST['client'];

$dates = $year."-".$month."-00";
$lm = $year."-".$month."-31";
include('./funcs/get_client_name.php');

$client_name = get_client_name($client_id);

if($auth == 1)
{
	




	if($func == "view")
		{
			include('./html/menu.html');
			include('./html/reports_client_view.html');
		}
	if($func == "view2")
		{
		
			include('./html/reports_client_view2.html');
		}
	if($func == "nonpaid")
		{
		
			include('./html/reports_client_nonpaid.html');
		}
	if($func == "nonpaidall")
		{
			
			include('./html/reports_client_nonpaid.html');
		}
}

?>