



<?php




include('./auth.php');
include('./html/menu.html');

?>






<style type="text/css">
<!--
.style5t {font-family: Arial, Helvetica, sans-serif; color: #000000;
font-size: 12px; font-weight: bold;}
.style8t {font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.style9t {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>
<table width="600" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
  <tr>
    <td colspan="3" bgcolor="#333333" background="images/table_head_bg.png" class="style8t">Client Manager</td>
  </tr><tr><td bgcolor="#FFFFFF" colspan="3">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#333333">
  <tr>
    <td colspan="4" background="images/dark_blue.png" bgcolor="#CCCCCC" class="style8t">Client List</td>
    </tr>
  <tr>
    <td width="50%" background="images/table_over.png" bgcolor="#CCCCCC" class="style5t"><div align="center">Client</div></td>
    <td width="" background="images/table_over.png" bgcolor="#CCCCCC" class="style5t"><div align="center">Phone</div></td>
    <td width="" background="images/table_over.png" bgcolor="#CCCCCC" class="style5t"><div align="center">Type</div></td>
    <td width="" background="images/table_over.png" bgcolor="#CCCCCC" class="style5t"><div align="center">Edit</div></td>
  </tr>

<?php



		$clients = mysql_query("SELECT * FROM clients ORDER BY name")or die (mysql_error());
				
		while($row = mysql_fetch_array($clients))
		{
		 
		 ?>
		 
		 <tr>
   		 <td bgcolor="#FFFFFF" class="style9t"><div align="left"><?php echo "<a href='view_client.php?id=$row[id]'>$row[name]</a>"; ?></div>
   		 <div align="left"></div></td>
   		 <td bgcolor="#FFFFFF" class="style9t"><div align="center"><?php echo "$row[phone]"; ?></div></td>
  		 <td bgcolor="#FFFFFF" class="style9t"><div align="center"><?php echo "$row[type]"; ?></div></td>
  		 <td bgcolor="#FFFFFF" class="style9t"><div align="center"><?php echo "<a href='edit_client.php?id=$row[id]'>edit</a>"; ?></div></td>
  		 </tr>
		 
		 <?php
		 
		}



?></table></td></tr></table>