<?php
$xt = 0;
while ($inv_paid[$xt] != null)
{
	echo "<tr><td bgcolor='#E6FFE6' class='Norm'><a href='./invoices.php?do=print&pid=$inv_paid[$xt]'> $inv_paid[$xt] </a> ($inv_paid_date[$xt])</td></tr>";
	$xt++;
}
?>