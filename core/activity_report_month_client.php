<?php

include('./connect.php');
include('./auth.php');





		$weekly = mysql_query("SELECT * FROM timesheets WHERE client='$client_id' AND daterec <= '$lm'  AND daterec > '$dates' ORDER BY daterec")or die (mysql_error());		
		while($row = mysql_fetch_array($weekly))
		{
			$techp_id = $row['techid'];
			
			?>
            
            
           <tr colspan="2">
          
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[daterec]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$tech"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[hours]"; ?></td>

          <td width="1000" bgcolor="#FFFFFF" class="style2"><?php echo "$row[description]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[paid]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[parts]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style2" align="center"><?php echo "$row[invoice]"; ?></td>
          
          
        </tr>
            
            <?php
			
			$total_hours = $total_hours + $row['hours'];
		}



?>