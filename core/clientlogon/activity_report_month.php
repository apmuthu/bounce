<?php

include('./connect.php');

?>
<br />
<table width="900" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
  <tr>
    <td colspan=3 class="MAINTABLE" align="left" valign="middle" bgcolor="#333333"><?php echo "$my_id_name"; ?></td>
    <td colspan=2 class="MAINTABLE" valign="middle" bgcolor="#333333"><span class="style1">Month of: <?php echo "$mo / $yr"; ?></span></td>
    </tr>
          <tr>
        <td bgcolor="#CCCCCC" class="Norm"><div align="center">Date</div></td>
        <td bgcolor="#CCCCCC" class="Norm"><div align="center">Hours</div></td>
        <td bgcolor="#CCCCCC" class="Norm"><div align="center">Description</div></td>
        <td width=50 bgcolor="#CCCCCC" class="Norm"><div align="center">Paid</div></td>
        <td width="75" bgcolor="#CCCCCC" class="Norm"><div align="center">Invoice #</div></td>
      </tr>
<?php

		$month_data = mysql_query("SELECT * FROM timesheets WHERE client='$my_id' AND daterec <= '$month_end'  AND daterec > '$month_start' ORDER BY daterec")or die (mysql_error());		
		while($client_data = mysql_fetch_array($month_data))
		{
		
			
			?>
            
            
           <tr colspan="2">
          
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="Norm" align="center"><?php echo "$client_data[daterec]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="Norm" align="center"><?php echo "$client_data[hours]"; ?></td>
          <td bgcolor="#FFFFFF" class="Norm"><?php echo "$client_data[description]"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="Norm" align="center"><?php echo "$client_data[paid]"; ?></td>
         <td nowrap="nowrap" bgcolor="#FFFFFF" class="Norm" align="center"><?php echo "$client_data[invoice]"; ?></td>
          
          
        </tr>
            
            <?php
			
			$total_hours = $total_hours + $client_data['hours'];
		}
?>
<tr>
        <td bgcolor="#CCCCCC" class="Norm">Total Hours Accumulated:</td>
        <td bgcolor="#CCCCCC" class="Norm"><div align="center"><?php echo "$total_hours"; ?></div></td>
        <td bgcolor="#CCCCCC" class="Norm"colspan="5"><div align="center"></div></td>
      </tr>
</table>
