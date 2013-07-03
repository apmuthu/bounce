<?php
$xt = 0;
while ($inv_new[$xt] != null)
{
	echo "<tr><td bgcolor='#FFF5BF' class='Norm'><a href='./invoices.php?do=print&pid=$inv_new[$xt]'> $inv_new[$xt] </a>($inv_new_date[$xt])</td><td bgcolor='#FFF5BF' class='Norm'> <a href='./invoices.php?do=payment&pid=$inv_new[$xt]'> Make Payment</a></td></tr>";
	$xt++;
}
?>