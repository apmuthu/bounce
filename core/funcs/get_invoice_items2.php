<?php      
	
	  if($invid == null)
	  {  
	  include('../funcs/get_company_info.php');
	  	$invid = $print_id;
	  }
	  else
	  {
	  	include('./funcs/get_company_info.php');
	  }

		$get_inv_items = mysql_query("SELECT * FROM invoice_items WHERE invoice='$invid'")or die (mysql_error());
			
			while($itm_row = mysql_fetch_array($get_inv_items))
			{
				
		$amount = 0;
		$amount = $itm_row[qty] * $itm_row[price];
		$amount = round($amount, 2);
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
		
      </tr>";
	  	
	   
	  }
	  
	 $totaltax = round($totaltax * $org_tax, 2);
	 $total = $total + $totaltax;
	  
?>
