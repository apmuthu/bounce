<?php

include('./connect.php');
include('./auth.php');



if($client_id == null)
{
	$weekly = mysql_query("SELECT * FROM timesheets WHERE paid='no' ORDER BY daterec")or die (mysql_error());		
}
else
{

	$weekly = mysql_query("SELECT * FROM timesheets WHERE client='$client_id' AND paid='no' ORDER BY daterec")or die (mysql_error());
}		



		while($row = mysql_fetch_array($weekly))
		{
			$techp_id = $row['techid'];
			$client_name = get_client_name($row[client]);
			
			?>
            
            
           <tr colspan="2">
          
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[daterec]"; ?></td>
          <td align='left' nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><a href="./view_client.php?id=<?php echo $row['client']; ?>"><?php echo "$client_name"; ?></a></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[hours]"; ?></td>

          <td width="1000" bgcolor="#FFFFFF" class="style2"><a href="./job_edit.php?id=<?php echo $row['id']; ?>"; ?><?php echo "$row[description]"; ?></a></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[paid]"; ?> Paid</td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><a href="invoice.php?id=<?php echo "$row[invoice]"; ?>"><?php echo "$row[invoice]"; ?></a></td>
          
          
        </tr>
            
            <?php
			
			$total_hours = $total_hours + $row['hours'];
		}



?>