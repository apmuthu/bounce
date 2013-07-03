<?php
      include('../funcs/get_company_info.php');

		if($invid == null)
		{
			$invid = $print_id;
		}
		$get_inv_items = mysql_query("SELECT * FROM invoice_items WHERE invoice='$invoice_num'")or die (mysql_error());
			
			while($itm_row = mysql_fetch_array($get_inv_items))
			{
				
				echo "got invoice items $itm_row[item]<br><br>";
		$amount = 0;
		$amount = $itm_row[qty] * $itm_row[price];
		$amount = round($amount, 2);
	  $total = $total + $amount;
	  if($itm_row[item] == "Part")
	  {
	  	$totaltax = $totaltax + $amount;
	  }
		$item_qty[] = $itm_row[qty];
		$item_type[] = $itm_row[type];
		$item_price[] = $itm_row[price];
		$item_desc[] = $itm_row[description];
	 /* echo "<tr>
        <td bgcolor='#FFFFFF' class='style3'>$itm_row[item]</td>
        <td bgcolor='#FFFFFF' class='style3'>$itm_row[description]</td>
        <td bgcolor='#FFFFFF' class='style3'>$itm_row[qty]</td>
        <td bgcolor='#FFFFFF' class='style3'>$$itm_row[price]</td>
        <td bgcolor='#FFFFFF' class='style3'>$$amount</td>
		
      </tr>";
	  	*/
	   
	  }
	  
	 $totaltax = round($totaltax * .07, 3);
	 $total = $total + $totaltax;
	 
	 $goog_tax = $totaltax;
	 
	  
?>
