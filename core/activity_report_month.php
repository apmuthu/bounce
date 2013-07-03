<?php

include('./connect.php');
include('./auth.php');





		$weekly = mysql_query("SELECT * FROM timesheets WHERE client='$client_id' AND daterec <= '$lm'  AND daterec > '$dates' ORDER BY DATEREC")or die (mysql_error());		
		while($row = mysql_fetch_array($weekly))
		{
			$techp_id = $row['techid'];
			
			?>
            
            
           <tr>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[daterec]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$tech"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[hours]"; ?></td>
          <td width="1000" bgcolor="#FFFFFF" class="style2"><a href="job_edit.php?id=<?php echo "$row[id]"; ?>"><?php echo "$row[description]"; ?></a></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[paid]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><a href="invoice.php?id=<?php echo "$row[invoice]"; ?>"><?php echo "$row[invoice]"; ?></a></td>
          
          
        </tr>
            
            <?php
			
			$total_hours = $total_hours + $row['hours'];
		}



?>