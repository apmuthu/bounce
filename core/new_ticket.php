<?php
include('./auth.php');
include('./html/menu.html');
include('./funcs/get_client_name.php');
include('./funcs/safe.php');

$func = $_GET['func'];
$ticket_id = $_GET['id'];
$client_id_get = $_GET['cid'];
$order = $_GET['order'];
if($client_id_get != null)
{
	$clnt_name = get_client_name($client_id_get);
}




	// VIEW TECH
	?>
	<style type="text/css">
<!--
.style1 {	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {font-family: Arial, Helvetica, sans-serif}
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
.style4 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
-->
</style>
	 <table border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
  <tr>
    <td background="./images/table_head_bg.png" bgcolor="#333333"><span class="style1">Ticket Manager</span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"> <table width="600" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
		<tr>
		  <td colspan="4" background="./images/dark_blue.png" bgcolor="#333333"><span class="style1"><?php echo "$tech_first"; ?>'s Tickets</span></td>
		</tr>
         <td width="5%" bgcolor="#CCCCCC" class="style2"><b>Number</td>
		<td width="60%" bgcolor="#CCCCCC" class="style2"><b>Subject</td>
        <td width="10%" bgcolor="#CCCCCC" class="style2"><b>Status</td>
        		
				  <td width="10%" bgcolor="#CCCCCC" class="style2"><b>Options</td>
		</tr>
	<?php
			$result_client = mysql_query("SELECT * FROM tickets WHERE ownerid='$tech_id'")or die (mysql_error());		
			while($row_client = mysql_fetch_array($result_client))
			{
							
				
				?>
				
				  <tr>
                  <td width="5%" <?php if($row_client[status] == "Open") { echo "bgcolor='#B3FFB3'"; } if($row_client[status] == "Closed") { echo "bgcolor='#F2C2BD'"; } if($row_client[status] == "Pending") { echo "bgcolor='#EEEEBB'"; }?> class="style2"><?php echo "$row_client[id]"; ?></td>
				  <td width="60%" <?php if($row_client[status] == "Open") { echo "bgcolor='#B3FFB3'"; } if($row_client[status] == "Closed") { echo "bgcolor='#F2C2BD'"; } if($row_client[status] == "Pending") { echo "bgcolor='#EEEEBB'"; }?> class="style2"><?php echo "$row_client[name]"; ?></td><td width="10%" <?php if($row_client[status] == "Open") { echo "bgcolor='#B3FFB3'"; } if($row_client[status] == "Closed") { echo "bgcolor='#F2C2BD'"; } if($row_client[status] == "Pending") { echo "bgcolor='#EEEEBB'"; }?> class="style2"><?php echo "$row_client[status]"; ?></td>
				  <td width="25%" bgcolor="#FFFFFF" class="style2"><a href='view.php?func=ticket&id=<?php echo "$row_client[id]"; ?>'>Viw</a> | <a href="update.php?func=statusupdate&id=<?php echo "$row_client[id]"; ?>&status=Closed&page=my_tickets.php">Del</a> </td>
				  </tr>	
				<?php
				
			
			}
			
			
	
			?>
			
			
			</table></td>
  </tr>
</table>
			
		  <?php



?>