<?php
include('./auth.php');
include('./menu.php');
include('./connect.php');

//GOOGLE API
require_once('../google/library/googlecart.php');
require_once('../google/library/googleitem.php');
require_once('../google/library/googleshipping.php');
require_once('../google/library/googletax.php');

//DigitalUsecase();

$func = $_GET['do'];
$print_id = $_GET['pid'];
if($func == null)
{

$get_list = mysql_query("SELECT * FROM invoice WHERE client='$my_id' order by invdate")or die (mysql_error());		
		while($row_inv_list = mysql_fetch_array($get_list))
		{
			$invoice_id = $row_inv_list[id];
			$invoice_status = $row_inv_list[paid];
			$invoice_date = $row_inv_list[invdate];
			
			//GET PAID
			if($row_inv_list[paid] == 1)
			{
				$inv_paid[] = $invoice_id;
				$inv_paid_date[] = $invoice_date;
			}
			
			//GET NEW - PENDING
			if($row_inv_list[paid] == 0)
			{
				$inv_new[] = $invoice_id;
				$inv_new_date[] = $invoice_date;
			}
			
			// GET LATE
			if($row_inv_list[paid] == 2)
			{
				$inv_late[] = $invoice_id;
				$inv_late_date[] = $invoice_date;
			}
			
			//echo "<br> INVOICE: <a href='invoices.php?do=print&pid=$invoice_id'> $invoice_id </a> <br>STATUS: $invoice_status <br>";
		}
include('./html/invoice_menu.html');


}
if($func == "payment")
	{
		
		Get_invoice($print_id);
	}
	
	
	
	
	
	
	
	

if($func == "print")
	{
		$get_inv = mysql_query("SELECT * FROM invoice WHERE id='$print_id'")or die (mysql_error());		
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
			
			include('./html/print_invoice.html');
		}
			}
	
	}
	
 function DigitalUsecase() 
 {
 	include('../funcs/get_company_info.php'); 
    $server_type = "production";
    $currency = "USD";
    $cart = new GoogleCart($goog_id, $goog_key, $server_type, $currency);

    echo $cart->CheckoutServer2ServerButton(Usecase());
  }
  
  
  
  
  
  
  
  
 function Get_invoice($invoice_num)
 {
	include('../funcs/get_company_info.php');
		$get_invs = mysql_query("SELECT * FROM invoice WHERE id='$invoice_num'")or die (mysql_error());		
		while($row_inv = mysql_fetch_array($get_invs))
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
			
			//GETTING INVOICE ITEMS AND QTY AND TYPE	
			include('../funcs/get_invoice_items3.php');
				
		}
				
	
	
	
	
	echo "Making Payment!!!<br><br>";
	
	echo "Invoice #: $invoice_num<br>";
	echo "Invoice items: $item_type[0]<br>";	
	echo "<br>Item_desc: $item_desc[0]<br>";	
	echo "<br>Tax: $goog_tax<br>";
	echo "Item_qty: $item_qty[0]<br>";
	echo "Item_price: $item_price[0]<br>";
	
	
	Usecase($invoice_num, $item_type, $item_desc, $goog_tax, $item_price, $item_qty);
	
 }











function Usecase($invoice_num, $item_type, $item_desc, $ttax, $item_price, $item_qty) 
{
  include('../funcs/get_company_info.php');
    $server_type = "production";
  $currency = "USD";
  $cart = new GoogleCart($goog_id, $goog_key, $server_type,
  $currency);
  $total_count = 1;
 
  
  $invoices = new GoogleItem("INVOICE", "INVOICE # $invoice_num", 1, 0.00);
	$cart->AddItem($invoices);
	
	$uu = 0;	
	while($item_qty[$uu] != null)
	{
		
		$additem = new GoogleItem($item_type[$uu], $item_desc[$uu], $item_qty[$uu], $item_price[$uu]);
		$cart->AddItem($additem);
	  
		
		$uu++;
	}

		$taxs = new GoogleItem("FL TAX", "Tax on Parts only", 1, $ttax);
		$cart->AddItem($taxs);
  
  
  // Add tax rules
  $tax_rule = new GoogleDefaultTaxRule(0.00);
  $tax_rule->SetStateAreas(array("MA", "FL", "CA"));
  $cart->AddDefaultTaxRules($tax_rule);
  
  // Specify <edit-cart-url>
 // $cart->SetEditCartUrl("https://www.exitbs.com/google");
  
  // Specify "Return to xyz" link
  $cart->SetContinueShoppingUrl("https://www.exitbs.com/clientlogon");
  
  // Request buyer's phone number
  $cart->SetRequestBuyerPhone(true);

// Add analytics data to the cart if its setted
  if(isset($_POST['analyticsdata']) && !empty($_POST['analyticsdata'])){
    $cart->SetAnalyticsData($_POST['analyticsdata']);
  }
// This will do a server-2-server cart post and send an HTTP 302 redirect status
// This is the best way to do it if implementing digital delivery
// More info http://code.google.com/apis/checkout/developer/index.html#alternate_technique
  list($status, $error) = $cart->CheckoutServer2Server();
  // if i reach this point, something was wrong
  echo "An error had ocurred: <br />HTTP Status: " . $status. ":";
  echo "<br />Error message:<br />";
  echo $error;
//
}

?>