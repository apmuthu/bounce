<?php

include('./connect.php');
include('./auth.php');
include('./funcs/get_client_name.php');

if($lw == null)
{
	$lessweek = mktime(0, 0, 0, $mh, $dy-7, $yr);
	$lw = date("Y-m-d", $lessweek);
}



		$weekly = mysql_query("SELECT * FROM timesheets WHERE techid = $user_id AND daterec <= '$dates'  AND daterec > '$lw'")or die (mysql_error());		
		while($row = mysql_fetch_array($weekly))
		{
			$client_name = get_client_name($row['client']);
			?>
            
            
           <tr>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$client_name"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[time]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[hours]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[remote]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[warranty]"; ?></td>
          <td bgcolor="#FFFFFF" class="style2"><?php echo "$row[description]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[paid]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[parts]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[invoice]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[daterec]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "<a href='./job_edit.php?id=$row[id]'>Edit</a> | <a href='./job_edit.php?id=$row[id]&func=delete'>Del</a>"; ?></td>
        </tr>
            
            <?php
			
			$total_hours = $total_hours + $row['hours'];
		}



?>