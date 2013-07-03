<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
}
-->
</style>
<?php 

include('./auth.php');
include('./funcs/get_company_info.php');
include('./funcs/safe.php');
include('./funcs/cc_proc.php');


$token = rand(1,10000).date(Ymds);
$func = $_GET['func'];
$post_cid = $_POST['client'];
$invid = $_GET['id'];
$item = safe($_POST['item']);
$payment_st = safe($_GET['status']);
$item_id = $_GET['item'];
$description = safe($_POST['description']);
$qty = safe($_POST['qty']);
$price = safe($_POST['price']);




if($func != null)
{
	if($func == "onlinepayment" && $invid != null)
	{
		Get_invoice($invid);
		$disp = "no";
	}
	
	if($func == "change_client")
	{
		?>
        <form method="post" action="./invoice.php?func=change_client2&id=<?php echo $invid; ?>">
        <?php
		 echo "<font face='arial' size=3'>Change bill to</font>";
		
		include('./funcs/get_clients.php');
		?>
        <input type="submit" name="Change" value="change" />
        </form>
        <?php	
		$disp = "no";
		
		
		
	}
	if($func == "find")
	{
		$disp = "no";
		include('./html/invoice_search.html');
	}
	if($func == "client_list")
	{
		include('./html/menu.html');
		include('./funcs/get_client_name.php');
		
		$client_name = get_client_name($post_cid);
		?>
               
               <table width="500" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
  <tr>
    <td background="./images/table_head_bg.png" bgcolor="#333333"><span class="style2">Invoices - <?php echo "$client_name"; ?></span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
      <tr>
        <td background="./images/dark_blue.png"><span class="style2">Client Invoice </span></td>
        <td background="./images/dark_blue.png"><span class="style2">Date</span></td>
        <td background="./images/dark_blue.png"><span class="style2">Paid</span></td>
      </tr>

		<?php		
		
		$get_list = mysql_query("SELECT * FROM invoice WHERE client='$post_cid' order by invdate")or die (mysql_error());		
		while($row_inv_list = mysql_fetch_array($get_list))
		{
			if($row_inv_list[paid] == 0)
			{
				$paid_status = "Not Paid";
				$bg_col = "#F2C2BD";
			}
			if($row_inv_list[paid] == 1)
			{
				$paid_status = "Paid";
				$bg_col = "#B3FFB3";
			}
			
			echo "
			<tr>
			<td bgcolor='#FFFFFF' class='style1'><a href='./invoice.php?id=$row_inv_list[id]'>$row_inv_list[id]</a></td>
			<td bgcolor='#FFFFFF' class='style1'>$row_inv_list[invdate]</td>
			<td bgcolor='$bg_col' class='style1'>$paid_status</td>
		  	</tr>";
		}
		
		?>
        
      </tr>
    </table>
    </td>
  </tr>
</table>
        
        <?php
		
	}
//OUTSTANDING ALL	
	if($func == "not_paid")
	{
		include('./html/menu.html');
		include('./funcs/get_client_name.php');
		
		
		?>
               
               <table width="500" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
  <tr>
    <td background="./images/table_head_bg.png" bgcolor="#333333"><span class="style2">Unpaid Invoices - All Clients<?php echo "$client_name"; ?></span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
      <tr>
	  	<td background="./images/dark_blue.png"><span class="style2">Client Name</span></td>
        <td background="./images/dark_blue.png"><span class="style2">Client Invoice </span></td>
        <td background="./images/dark_blue.png"><span class="style2">Date</span></td>
        <td background="./images/dark_blue.png"><span class="style2">Paid</span></td>
      </tr>

		<?php		
		
		$get_list = mysql_query("SELECT * FROM invoice WHERE paid = 0 order by invdate")or die (mysql_error());		
		while($row_inv_list = mysql_fetch_array($get_list))
		{
			$client_name = get_client_name($row_inv_list['client']);
			if($row_inv_list[paid] == 0)
			{
				$paid_status = "Not Paid";
				$paid_st = "1";
				$bg_col = "#F2C2BD";
			}
			if($row_inv_list[paid] == 1)
			{
				$paid_status = "Paid";
				$paid_st = "0";
				$bg_col = "#B3FFB3";
			}
			
			echo "
			<tr>
			<td bgcolor='#FFFFFF' class='style1'><a href='./view_client.php?id=$row_inv_list[client]'>$client_name</a></td>
			<td bgcolor='#FFFFFF' class='style1'><a href='./invoice.php?id=$row_inv_list[id]'>$row_inv_list[id]</a></td>
			<td bgcolor='#FFFFFF' class='style1'>$row_inv_list[invdate]</td>
			<td bgcolor='$bg_col' class='style1'><a href='./invoice.php?id=".$row_inv_list[id]."&func=payment2&status=".$paid_st."'>$paid_status</a></td>
		  	</tr>";
		}
		
		?>
        
      </tr>
    </table>
    </td>
  </tr>
</table>
        
        <?php
		
	}
	
	//OUTSTANDING PER CLIENT	
	if($func == "not_paidcl")
	{
		include('./html/menu.html');
		include('./funcs/get_client_name.php');
		$client_name = get_client_name($post_cid);
		
		?>
               
               <table width="500" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
  <tr>
    <td background="./images/table_head_bg.png" bgcolor="#333333"><span class="style2">Unpaid Invoices - <?php echo "$client_name"; ?></span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
      <tr>
	  	<td background="./images/dark_blue.png"><span class="style2">Client Name</span></td>
        <td background="./images/dark_blue.png"><span class="style2">Client Invoice </span></td>
        <td background="./images/dark_blue.png"><span class="style2">Date</span></td>
        <td background="./images/dark_blue.png"><span class="style2">Paid</span></td>
      </tr>

		<?php		
		
		$get_list = mysql_query("SELECT * FROM invoice WHERE paid = 0 AND CLIENT='$post_cid' order by invdate")or die (mysql_error());		
		while($row_inv_list = mysql_fetch_array($get_list))
		{
			$client_name = get_client_name($row_inv_list['client']);
			if($row_inv_list[paid] == 0)
			{
				$paid_status = "Not Paid";
				$paid_st = "1";
				$bg_col = "#F2C2BD";
			}
			if($row_inv_list[paid] == 1)
			{
				$paid_status = "Paid";
				$paid_st = "0";
				$bg_col = "#B3FFB3";
			}
			
			echo "
			<tr>
			<td bgcolor='#FFFFFF' class='style1'><a href='./view_client.php?id=$row_inv_list[client]'>$client_name</a></td>
			<td bgcolor='#FFFFFF' class='style1'><a href='./invoice.php?id=$row_inv_list[id]'>$row_inv_list[id]</a></td>
			<td bgcolor='#FFFFFF' class='style1'>$row_inv_list[invdate]</td>
			<td bgcolor='$bg_col' class='style1'><a href='./invoice.php?id=".$row_inv_list[id]."&func=payment2&status=".$paid_st."'>$paid_status</a></td>
		  	</tr>";
		}
		
		?>
        
      </tr>
    </table>
    </td>
  </tr>
</table>
        
        <?php
		
	}
	
	
	
	//CHANGE CLIENT ON INVOICE 
	if($func == "change_client2")
	{
		$update_invoice = mysql_query("UPDATE invoice set client='$post_cid' WHERE id='$invid'")or die (mysql_error());
		

		?>
			<META META HTTP-EQUIV=Refresh CONTENT="0; URL=invoice.php?id=<?php echo $invid; ?>">
		<?php
		$disp = "no";
		
	}
	
	
	
	//CHANGE INVOICE PAYMENT STATUS
	if($func == "payment")
	{
		$update_invoice = mysql_query("UPDATE invoice set paid='$payment_st' WHERE id='$invid'")or die (mysql_error());
		

		?>
			<META META HTTP-EQUIV=Refresh CONTENT="0; URL=invoice.php?id=<?php echo $invid; ?>">
		<?php
		$disp = "no";
		
	}
	//CHANGE INVOICE
	if($func == "payment2")
	{
		$update_invoice = mysql_query("UPDATE invoice set paid='$payment_st' WHERE id='$invid'")or die (mysql_error());
		

		?>
			<META META HTTP-EQUIV=Refresh CONTENT="0; URL=invoice.php?func=not_paid">
		<?php
		$disp = "no";
		
	}
	
	if($func == "new")
	{
		
		$insert_invoice = mysql_query("INSERT INTO invoice (token, invdate) values ('$token' ,'$datesql')")or die (mysql_error());
		$get_tokn = mysql_query("SELECT * FROM invoice WHERE token='$token'")or die (mysql_error());
			
			while($row_inv = mysql_fetch_array($get_tokn))
			{
				$invoice_id = $row_inv[id];
			}
		?>
			<META META HTTP-EQUIV=Refresh CONTENT="0; URL=invoice.php?id=<?php echo $invoice_id; ?>">
		<?php
		
	
	}
	if($func == "other")
	{
		include('./html/add_invoice_other.html');
		$disp = "no";
	}
	if($func == "add")
	{
		$update_invoice = mysql_query("INSERT INTO invoice_items (invoice, item, description, qty, price) values ('$invid', '$item', '$description', '$qty', '$price')")or die (mysql_error());
		?>
			<META META HTTP-EQUIV=Refresh CONTENT="0; URL=invoice.php?id=<?php echo $invid; ?>">
		<?php
		$disp = "no";
	}
	if($func == "rmitm")
	{
		$update_invoice = mysql_query("DELETE FROM invoice_items WHERE id=$item_id")or die (mysql_error());
		?>
			<META META HTTP-EQUIV=Refresh CONTENT="0; URL=invoice.php?id=<?php echo $invid; ?>">
		<?php
	}
	if($func ="print")
	{
		$get_inv = mysql_query("SELECT * FROM invoice WHERE id='$invid'")or die (mysql_error());		
		while($row_inv = mysql_fetch_array($get_inv))
		{
			$dte = $row_inv['invdate'];
			$print_date = $dte[5].$dte[6]."/".$dte[8].$dte[9]."/".$dte[0].$dte[1].$dte[2].$dte[3];
			$cid = $row_inv['client'];
			
				$client_name_data = mysql_query("SELECT * FROM clients WHERE id='$cid'")or die (mysql_error());		
				while($row_cl = mysql_fetch_array($client_name_data))
				{
					$client_name = $row_cl['name'];
					$client_address = $row_cl['address'];
					$client_phone = $row_cl['phone'];	
					$client_city = $row_cl['city'];
					$client_state = "FL ";
					$client_zip = $row_cl['zip'];
				}
		if($disp != "no")
		{
			include('./funcs/get_client_name.php');
			include('./html/print_invoice.html');
		}
			}
	
	}
	
	
}
else
{
		
	
			$get_inv = mysql_query("SELECT * FROM invoice WHERE id='$invid'")or die (mysql_error());		
			while($row_inv = mysql_fetch_array($get_inv))
			{
				$dte = $row_inv['invdate'];
				$print_date = $dte[5].$dte[6]."/".$dte[8].$dte[9]."/".$dte[0].$dte[1].$dte[2].$dte[3];
				$cid = $row_inv['client'];
				if($row_inv['paid'] == 1)
				{
					$paid_status = "Paid";
					$bg_col = "#B3FFB3";
					$paid_st = "0";
				}
				else
				{
					$paid_status = "Not Paid";
					$bg_col = "#F2C2BD";
					$paid_st = "1";
				}
				
					$client_name_data = mysql_query("SELECT * FROM clients WHERE id='$cid'")or die (mysql_error());		
					while($row_cl = mysql_fetch_array($client_name_data))
					{
						$client_name = $row_cl['name'];
						$client_address = $row_cl['address'];
						$client_phone = $row_cl['phone'];	
						$client_city = $row_cl['city'];
						$client_state = "FL ";
						$client_zip = $row_cl['zip'];
					}
			
				include('./funcs/get_client_name.php');
		if($disp != "no")
		{
				include('./html/new_invoice.html');
		}
			
			
		}
}



?>