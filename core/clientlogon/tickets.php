<?php
include('./auth.php');
include('./menu.php');
include('../funcs/get_tech_name.php');

$ticket_id = $_GET['id'];
$func = $_GET['func'];

if($func == "ticket")
{

			$result_tik = mysql_query("SELECT * FROM tickets WHERE id='$ticket_id'")or die (mysql_error());		
			while($row_tik = mysql_fetch_array($result_tik))
			{
				
				$tid = $row_tik['id'];
				$clients_name = get_client_name($row_tik[client_id]);
				$techs_name = get_tech_name($row_tik[ownerid]);
				include('./html/view_ticket.html');
			}



}



if($func != "ticket" && $my_id != null)
{
?>


<br>
<table align='center' bgcolor="#333333" cellpadding=2 cellspacing=1 width="500">
<tr>
<td width=50 colspan=3 class="MAINTABLE"><?php echo "$client_id_name"; ?> TICKET VIEW</td>
</tr>
<tr>
<td width=50 bgcolor="#CCCCCC" class="NORM">T#</td><td bgcolor="#CCCCCC" class="NORM">Title</td><td bgcolor="#CCCCCC" class="NORM">Status</td>
</tr>
<?php

			$result_client = mysql_query("SELECT * FROM tickets WHERE client_id='$my_id' ORDER BY status DESC")or die (mysql_error());		
			while($row_client = mysql_fetch_array($result_client))
			{
							
				
				?>
				
                  <td  <?php if($row_client[status] == "Open") { echo "bgcolor='#B3FFB3'"; } if($row_client[status] == "Closed") { echo "bgcolor='#F2C2BD'"; } if($row_client[status] == "Pending") { echo "bgcolor='#EEEEBB'"; }?> class="Norm"><?php echo "$row_client[id]"; ?></td>
				  <td  <?php if($row_client[status] == "Open") { echo "bgcolor='#B3FFB3'"; } if($row_client[status] == "Closed") { echo "bgcolor='#F2C2BD'"; } if($row_client[status] == "Pending") { echo "bgcolor='#EEEEBB'"; }?> class="Norm"><a href='tickets.php?func=ticket&id=<?php echo "$row_client[id]"; ?>'><?php echo "$row_client[name]"; ?></a></td>
                  <td  <?php if($row_client[status] == "Open") { echo "bgcolor='#B3FFB3'"; } if($row_client[status] == "Closed") { echo "bgcolor='#F2C2BD'"; } if($row_client[status] == "Pending") { echo "bgcolor='#EEEEBB'"; }?> class="Norm"><?php echo "$row_client[status]"; ?></td></tr>	
				<?php
				
			
			}
			
			
	
			?>
</table>
			
		  <?php



}

?>