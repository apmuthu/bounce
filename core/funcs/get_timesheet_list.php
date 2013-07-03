<?php
		include('./funcs/get_tech_name.php');
		
		//GETTING ALL TIMESHEETS THAT NEED APPROVAL / PENDING
		//$last90 = date("Y-m-d", "less 3 months");
		$timesheet_list = mysql_query("SELECT * FROM timesheets_app")or die (mysql_error());				
		while($sheet_list = mysql_fetch_array($timesheet_list))
		{
			
						$date_weekly = date("m-d-Y", strtotime($sheet_list['dateend']));
						$date_weekly2 = date("m-d-Y", strtotime("$sheet_list[dateend] - 1 week"));
						$date_weekly_form = date("Y-m-d", strtotime($sheet_list['dateend']));
						
			?>
          <tr class="style1">
          <td width="24%" align="center" bgcolor="#FFFFFF"><?php echo get_tech_name($sheet_list['ownerid']); ?></td>
          <td width="38%" align="center" bgcolor="#FFFFFF"><a href="./timesheet.php?funcs=View&tech=<?php echo $sheet_list['ownerid']; ?>&date=<?php echo $date_weekly_form; ?>"><?php echo $date_weekly2 . " &nbsp; to &nbsp; " . $date_weekly; ?></a></td>
          <td width="38%" align="center" <?php if($sheet_list['status'] == "Approved") { echo "bgcolor='#A4FFA4'"; } if ($sheet_list['status'] == "Pending") { echo "bgcolor='#FFCC33'"; } if($sheet_list['status'] == null) { echo "bgcolor='#FFFFFF'"; } ?>><?php echo $sheet_list['status']; ?></td>
          </tr>
            
            
            <?php
		}


?>