<?php

include('./connect.php');
include('./auth.php');
include('./funcs/get_client_name.php');

if($lw == null)
{
	$lessweek = mktime(0, 0, 0, $mh, $dy-7, $yr);
	$lw = date("Y-m-d", $lessweek);
}



		$weekly = mysql_query("SELECT * FROM timesheets WHERE techid='$techp_id' AND daterec <= '$dates'  AND daterec > '$lw' ORDER BY daterec")or die (mysql_error());		
		while($row = mysql_fetch_array($weekly))
		{
			$client_name = get_client_name($row['client']);
			
			if($row[approval] == 0)
			{
				$appr_col = "#F2C2BD";
				$appr_name = "Not Approved";
				$appr_final = 0;
				
			}
			if($row[approval] == 1)
			{
				$appr_col = "#B3FFB3";
				$appr_name = "Approved";
			}
			
			?>
            
            
           <tr>
          <td width="134" nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$client_name"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[hours]"; ?></td>
          <td width="1000" bgcolor="#FFFFFF" class="style2"><?php echo "$row[description]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[daterec]"; ?></td>
          <td nowrap="nowrap" <?php echo "bgcolor=\"".$appr_col. "\""; ?> class="style2" align="center"><?php echo "$appr_name"; ?></td>
        </tr>
            
            <?php
			
			$total_hours = $total_hours + $row['hours'];
			
			if($appr_final == 0)
			{
				$appr_col = "#CC0000";
				$appr_name_final = "Not Approved";
			}
			
			if($appr_final != 0)
			{
				$appr_col = "#00CC33";
				$appr_name_final = "Not Approved";
			}
			
			
		}



?>