<?php
		include('./connect.php');
		$i = 0;
		$p = 0;
		$this_mo = date("m");	
		$this_yr = date("Y");
	
	
		
		$endmonth = $this_yr."-".$this_mo."-31";
		$begmonth = $this_yr."-".$this_mo."-01";
		
		
		
	

?>




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
    <td colspan="2" background="./images/table_head_bg.png" bgcolor="#333333"><span class="style1">Most Hours This Week</span></td>
  </tr>
  <tr>
    <td width="205" bgcolor="#FFFFFF"><table width="100%" cellpadding="3" cellspacing="1" bgcolor="#333333">
      <tr class="style4">
        <td width="675" height="22" background="./images/dark_blue.png" bgcolor="#CCCCCC" class="style1">User</td>
      </tr>
      <tr>
        <td bgcolor="#CCCCCC" class="plain_textBOLD">---</td>
      </tr>
    </table></td>
    <td width="80" bgcolor="#FFFFFF"><table width="100%" cellpadding="3" cellspacing="1" bgcolor="#333333">
      <tr class="style4">
        <td width="675" height="22" background="./images/dark_blue.png" bgcolor="#CCCCCC" class="style1">Hours</td>
      </tr>
      <tr>
        <td bgcolor="#CCCCCC" class="plain_textBOLD">0</td>
      </tr>
    </table></td>
  </tr>
</table>
<br />
</body>
</html>
