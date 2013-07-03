<?php
include('./connect.php');
$closed = 0;
$open = 0;
$pending = 0;

			$ticket_stat = mysql_query("SELECT * FROM tickets WHERE ownerid='$tech_id' AND status='Closed'")or die (mysql_error());		
			while($row_ts = mysql_fetch_array($ticket_stat))
			{
				$closed++;
			}
			$ticket_stat = mysql_query("SELECT * FROM tickets WHERE ownerid='$tech_id' AND status='Pending'")or die (mysql_error());		
			while($row_ts = mysql_fetch_array($ticket_stat))
			{
				$pending++;
			}
			$ticket_stat = mysql_query("SELECT * FROM tickets WHERE ownerid='$tech_id' AND status='Open'")or die (mysql_error());		
			while($row_ts = mysql_fetch_array($ticket_stat))
			{
				$open++;
			}
			
		

?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="250" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
  <tr>
    <td colspan="3" background="./images/table_head_bg.png" bgcolor="#333333"><span class="style1">My Tickets</span></td>
  </tr>
  <tr>
    <td width="67" bgcolor="#FFFFFF"><table width="100%" cellpadding="3" cellspacing="1" bgcolor="#333333">
      <tr class="style4">
        <td width="675" height="22" background="./images/dark_blue.png" bgcolor="#CCCCCC" class="style1">Open</td>
      </tr>
      <tr>
        <td bgcolor="#B3FFB3" class="plain_textBOLD"><?php echo $open; ?></td>
      </tr>
    </table></td>
    <td width="88" bgcolor="#FFFFFF"><table width="100%" cellpadding="3" cellspacing="1" bgcolor="#333333">
      <tr class="style4">
        <td width="675" height="22" background="./images/dark_blue.png" bgcolor="#CCCCCC" class="style1">Pending</td>
      </tr>
      <tr>
        <td bgcolor="#EEEEBB" class="plain_textBOLD"><?php echo $pending; ?></td>
      </tr>
    </table></td>
    <td width="73" bgcolor="#FFFFFF"><table width="100%" cellpadding="3" cellspacing="1" bgcolor="#333333">
      <tr class="style4">
        <td width="675" height="22" background="./images/dark_blue.png" bgcolor="#CCCCCC" class="style1">Closed</td>
      </tr>
      <tr>
        <td bgcolor="#F2C2BD" class="plain_textBOLD"><?php echo $closed; ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />
</body>
</html>
