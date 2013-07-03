<?php
echo "<title> Ticket Manager </title>";
include('./auth.php');
include('./html/menu.html');
include('./funcs/get_client_name.php');
include('./funcs/get_tech_name.php');
include('./funcs/safe.php');


$func = $_GET['func'];
$ticket_id = $_GET['id'];
$client_id_get = $_GET['cid'];
if($client_id_get != null)
{
	$clnt_name = get_client_name($client_id_get);
}







if($func == "ticket")
{

			$result_tik = mysql_query("SELECT * FROM tickets WHERE id='$ticket_id'")or die (mysql_error());		
			while($row_tik = mysql_fetch_array($result_tik))
			{
				
				$tid = $row_tik['id'];
				$clients_name = get_client_name($row_tik[client_id]);
				$techs_name = get_tech_name($row_tik[ownerid]);
				$tk_notes = fixsafe($row_tik[notes]);
				include('./html/view_ticket.html');
			}



}

if($func == "viewclient" || $client_id_get != null)
{

	// VIEW CLIENT
	?>
	<style type="text/css">
<!--
.style1 {	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
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
    <td bgcolor="#FFFFFF"><table width="600" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
		<tr>
		  <td colspan="5" background="./images/dark_blue.png" bgcolor="#333333"><span class="style1"><?php echo "$clnt_name"; ?>'s Tickets</span></td>
		</tr>
         <td width="5%" bgcolor="#CCCCCC" class="style2"><b>Tik#</td><td width="" bgcolor="#CCCCCC" class="style2"><b>Priority</td>
		<td width="60%" bgcolor="#CCCCCC" class="style2"><b>Subject</td><br />
		<td width="" bgcolor="#CCCCCC" class="style2"><b>Status</td>
        
		<td width="20%" bgcolor="#CCCCCC" class="style2"><b>Ticket Options</td>
        
		</tr>
	<?php
			$result_client = mysql_query("SELECT * FROM tickets WHERE client_id='$client_id_get' ORDER BY id DESC")or die (mysql_error());		
			while($row_client = mysql_fetch_array($result_client))
			{
							
				
				?>
				
				  <tr>
                  <td  <?php if($row_client[status] == "Open") { echo "bgcolor='#B3FFB3'"; } if($row_client[status] == "Closed") { echo "bgcolor='#F2C2BD'"; } if($row_client[status] == "Pending") { echo "bgcolor='#EEEEBB'"; }?> class="style2"><?php echo "$row_client[id]"; ?></td>
                  <td  <?php if($row_client[priority] == "High") { echo "bgcolor='#CC0000'"; } if($row_client[priority] == "Normal") { echo "bgcolor='#CCCC00'"; } if($row_client[priority] == "Low") { echo "bgcolor='#00CC33'"; }?> class="style2"><?php echo "$row_client[priority]"; ?></td>
				  <td  <?php if($row_client[status] == "Open") { echo "bgcolor='#B3FFB3'"; } if($row_client[status] == "Closed") { echo "bgcolor='#F2C2BD'"; } if($row_client[status] == "Pending") { echo "bgcolor='#EEEEBB'"; }?> class="style2"><a href='view_tickets.php?func=ticket&id=<?php echo "$row_client[id]"; ?>'><?php echo "$row_client[name]"; ?></a></td>
                  <td  <?php if($row_client[status] == "Open") { echo "bgcolor='#B3FFB3'"; } if($row_client[status] == "Closed") { echo "bgcolor='#F2C2BD'"; } if($row_client[status] == "Pending") { echo "bgcolor='#EEEEBB'"; }?> class="style2"><?php echo "$row_client[status]"; ?></td>                  
                  <td  bgcolor="#FFFFFF" class="style2"><a href="update_tickets.php?func=statusupdate&id=<?php echo "$row_client[id]"; ?>&status=Closed&page=view_tickets.php?cid=<?php echo "$client_id_get"; ?>">Close</a> | <a href="update_tickets.php?func=statusupdate&id=<?php echo "$row_client[id]"; ?>&status=Pending&page=view_tickets.php?cid=<?php echo "$client_id_get"; ?>">Pending</a> | <a href="update_tickets.php?func=clear&id=<?php echo "$row_client[id]"; ?>&status=clear&page=view_tickets.php?cid=<?php echo "$client_id_get"; ?>">Clr</a> </td>
				  </tr>	
				<?php
				
			
			}
			
			
	
			?>
			
			
			</table></td>
  </tr>
</table>
			
		  <?php



}

if($func == null && $client_id_get == null)
{


// VIEW CLIENTS STATS
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
    <td bgcolor="#FFFFFF"><table width="600" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
    <tr>
      <td colspan="4" background="./images/dark_blue.png" bgcolor="#333333"><span class="style1">Stats</span></td>
    </tr>
    <td width="70%" bgcolor="#CCCCCC" class="style2"><b>Name</td>
              <td width="10%" align="center" valign="middle" bgcolor="#00CC33" class="style2"><b>
              <div align="center">Open</div></td>
          <td width="10%" align="center" valign="middle" bgcolor="#CCCC00" class="style2"><b>
          <div align="center">Pending</div></td>
          <td width="10%" align="center" valign="middle" bgcolor="#CC0000" class="style2"><div align="center"><b>Closed</b></div></td>
              </tr>
<?php
		$result_client = mysql_query("SELECT * FROM clients ORDER BY name")or die (mysql_error());		
		while($row_client = mysql_fetch_array($result_client))
		{
			$clint_id = $row_client[id];
			$open = 0;
			$closed = 0;
			$pending = 0;
			
			$result_tickets = mysql_query("SELECT * FROM tickets where client_id='$clint_id'")or die (mysql_error());		
			while($row = mysql_fetch_array($result_tickets))
			{
					if($row[status] == "Open")
					{
						$open++;			
					
					}
					if($row[status] == "Closed")
					{
						$closed++;			
					
					}
					if($row[status] == "Pending")
					{
						$pending++;			
					
					}
					
			}
			if(($open + $closed + $pending) != 0)
			{
			?>
            
              <tr>
              <td width="70%" bgcolor="#FFFFFF" class="style2"><?php echo "<a href='view_tickets.php?func=viewclient&cid=$clint_id&clientname=$row_client[name]'>$row_client[name]</a>"; ?></td>
              <td width="10%" bgcolor="#B3FFB3" class="style2"><?php echo "$open"; ?></td>
              <td width="10%" bgcolor="#EEEEBB" class="style2"><?php echo "$pending"; ?></td>
              <td width="10%" bgcolor="#F2C2BD" class="style2"><?php echo "$closed"; ?></td>
              </tr>	
            <?php
			}
		
		}
		
		

		?>
        
        
    </table></td>
  </tr>
</table>
        
      <?php
}
//FUNC == null

	  
	  ?>