<?php
$xt = 0;
while ($inv_new[$xt] != null)
{
	echo "<tr><td bgcolor='#FFD7D7' class='Norm'><a href='./invoices.php?do=print&pid=$inv_late[$xt]'> $inv_late[$xt] </a>($inv_late_date[$xt])<td bgcolor='#FFD7D7' class='Norm'>  <a href='./invoices.php?do=payment&pid=$inv_late[$xt]'> Make Payment</a></td></td></tr>";
	$xt++;
}
?>