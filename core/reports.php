<?php

include('./auth.php');
include('./connect.php');
include('./html/menu.html');


$type = $_GET['type'];
$user_id = $_POST['id'];

$dates = $_POST['date'];

$mh = $dates[5].$dates[6];
$dy = $dates[8].$dates[9];
$yr = $dates[0].$dates[1].$dates[2].$dates[3];



if($type == "tech" && $user_id == null)
{
	include('./html/reports_tech_choose.html');
	
	?>
     
      <table width="600" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
    <tr>
      <td bgcolor="#333333"><span class="style2">Timesheet Activity</span></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#333333">
        <tr class="style2">
          <td align="center" background="./images/dark_blue.png" bgcolor="#CCCCCC">Name</td>
          <td align="center" background="./images/dark_blue.png" bgcolor="#CCCCCC">Week</td>
          <td align="center" background="./images/dark_blue.png" bgcolor="#CCCCCC">Status</td>
        </tr>
    
    
    <?php
	include('./funcs/get_timesheet_list.php');
	?>
    
    </tr>
      </table></td>
    </tr>
  </table>
    <?php
}

if($type == "client" && $user_id == null)
{
	include('./html/reports_client_choose.html');
}



?>