<?php
include('./connect.php');
include('./funcs/get_client_name.php');
		
		$tech_disp = mysql_query("SELECT * FROM client_users order by name")or die (mysql_error());		
		while($row_techs = mysql_fetch_array($tech_disp))
		{
			
			$client_get_name = get_client_name($row_techs['account']);
			
			if($row_techs['type'] == "denied")
			{
				$bg_color = "#F59494";
			}
			else
			{
				$bg_color = "#FFFFFF";
			}
		?>
			<tr class="style4">
			<td align='left' bgcolor="<?php echo "$bg_color"; ?>" class="style10"><?php echo $row_techs['name']; ?></td>
            <td align='left' bgcolor="<?php echo "$bg_color"; ?>" class="style10"><?php echo $row_techs['username']; ?></td>
            <td width="120" align='left'  bgcolor="<?php echo "$bg_color"; ?>" class="style10"><?php echo $client_get_name; ?></td>
            <td width="180" align='left'  bgcolor="<?php echo "$bg_color"; ?>" class="style10"><a href="./client_change.php?func=del&id=<?php echo $row_techs['id']; ?>">DELETE</a> | <a href="./client_change.php?func=edit&id=<?php echo $row_techs['id']; ?>">EDIT</a> | <a href="./client_change.php?func=pwd&id=<?php echo $row_techs['id']; ?>">PWD RESET</a></td>
             </tr> 
              
        <?php
		}
		?>
        <tr class="style4">
        <td align='left' colspan="4" bgcolor="#CCCCCC" class="style10"><a href="./new_client_logon.php">Add New Logon</a></td>
        </tr>
        <?php
?>