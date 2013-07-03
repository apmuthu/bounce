<?php

include('./connect.php');
include('./auth.php');
include('./funcs/get_client_name.php');

if($lw == null)
{
	
	$lw = date("Y-m-d", strtotime("$dates - 1 week"));
}



		$weekly = mysql_query("SELECT * FROM timesheets WHERE techid = '$tech_usrid' AND daterec <= '$dates'  AND daterec > '$lw' ORDER BY daterec")or die (mysql_error());
		while($row = mysql_fetch_array($weekly))
		{
			$client_name = get_client_name($row['client']);
			$timid = $row[id];
			$ddt = $row[daterec];
			
			$mh_sql = $ddt[5].$ddt[6];
			$dy_sql = $ddt[8].$ddt[9];
			$yr_sql = $ddt[0].$ddt[1].$ddt[2].$ddt[3];
			$date_rec_sql = $mh_sql. "/". $dy_sql . "/" . $yr_sql;
			$r_descr = fixsafe($row[description]);
			
			?>
            
            
           <tr>
          <td width="134" height="25" nowrap="nowrap" bgcolor="#FFFFFF" class="style21" align="center"><?php echo "$client_name"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style21" align="center"><?php echo "$row[hours]"; ?></td>
          <td width="1000" bgcolor="#FFFFFF" class="style21"><?php echo "$r_descr"; ?></td>
          <td nowrap="nowrap" bgcolor="#FFFFFF" class="style21" align="center"><?php echo "$date_rec_sql"; ?></td>
          <td nowrap="nowrap" <?php if ($approval_status == 'Pending') {  echo "bgcolor='#FFCC33'"; } if ($approval_status == 'Approved') {  echo "bgcolor='#A4FFA4'"; }else { echo "bgcolor='#FFFFFF'"; } ?> class="style21" align="center"><?php if ($approval_status == null && $tech_id == $tech_usrid) {  echo "<a href='./job_edit.php?id=$row[id]'>Edit</a> | <a href='./job_edit.php?id=$row[id]&func=delete'>Del</a><br>"; } else { echo $approval_status; }if ($approval_status == null && $tech_id != $tech_usrid) {  echo " Not Submitted"; } ?></td>
        </tr>
            
            <?php
			
			$total_hours = $total_hours + $row['hours'];
		}



?>