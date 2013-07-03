<?php
include('./connect.php');
		
		$tech_disp = mysql_query("SELECT * FROM users order by name")or die (mysql_error());		
		while($row_techs = mysql_fetch_array($tech_disp))
		{
			
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
            <td width="120" align='left'  bgcolor="<?php echo "$bg_color"; ?>" class="style10"><?php echo $row_techs['type']; ?></td>
            <td width="180" align='left'  bgcolor="<?php echo "$bg_color"; ?>" class="style10"><a href="./tech_change.php?func=del&id=<?php echo $row_techs['id']; ?>">DISABLE</a> | <a href="./tech_change.php?func=edit&id=<?php echo $row_techs['id']; ?>">EDIT</a> | <a href="./tech_change.php?func=pwd&id=<?php echo $row_techs['id']; ?>">PWD RESET</a></td>
             </tr> 
              
        <?php
		}
		?>
        <tr class="style4">
        <td align='left' colspan="4" bgcolor="#CCCCCC" class="style10"><a href="./new_user.php">Add Tech</a></td>
        </tr>
        <?php
?>