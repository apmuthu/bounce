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
    <td colspan="2" background="./images/table_head_bg.png" bgcolor="#333333"><span class="style1">My Hours Stats</span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" cellpadding="3" cellspacing="1" bgcolor="#333333">
      <tr class="style4">
        <td width="675" height="22" background="./images/dark_blue.png" bgcolor="#CCCCCC" class="style1">This Week</td>
      </tr>
      <tr>
        <td bgcolor="#CCCCCC" class="plain_textBOLD"><?php include('./stats/make_thisweek_hours.php'); ?></td>
      </tr>
    </table></td>
    <td bgcolor="#FFFFFF"><table width="100%" cellpadding="3" cellspacing="1" bgcolor="#333333">
      <tr class="style4">
        <td width="675" height="22" background="./images/dark_blue.png" bgcolor="#CCCCCC" class="style1">This Month</td>
      </tr>
      <tr>
        <td bgcolor="#CCCCCC" class="plain_textBOLD"><?php include('./stats/make_thismonth_hours.php'); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><img src="./stats/img_get_week.php" /></td>
  </tr>
</table>
<br />
</body>
</html>
