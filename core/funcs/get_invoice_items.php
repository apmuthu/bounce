<?php
      include('./funcs/get_company_info.php');

		$get_inv_items = mysql_query("SELECT * FROM invoice_items WHERE invoice='$invid'")or die (mysql_error());
			
			while($itm_row = mysql_fetch_array($get_inv_items))
			{
				
		$amount = 0;
		$amount = $itm_row[qty] * $itm_row[price];	
	  $total = $total + $amount;
	  if($itm_row[item] == "Part")
	  {
	  	$totaltax = $totaltax + $amount;
	  }
	  
	  echo "<tr>
        <td bgcolor='#FFFFFF' class='style3'>$itm_row[item]</td>
        <td bgcolor='#FFFFFF' class='style3'>$itm_row[description]</td>
        <td bgcolor='#FFFFFF' class='style3'>$itm_row[qty]</td>
        <td bgcolor='#FFFFFF' class='style3'>$$itm_row[price]</td>
        <td bgcolor='#FFFFFF' class='style3'>$$amount</td>
		<td width='17' bgcolor='#FFFFFF' class='style1 style3'><div align='center'><a href='./invoice.php?id=$invid&func=rmitm&item=$itm_row[id]'>X</a></div></td>
      </tr>";
	  	
	   
	  }
	  
	 $totaltax = round($totaltax * $org_tax, 2);
	 $total = $total + $totaltax;
	  
?>
