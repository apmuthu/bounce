<?php




		$get_techs = mysql_query("SELECT * FROM users where id='$techp_id'")or die (mysql_error());		
		while($rows = mysql_fetch_array($get_techs))
		{
			$tech = $rows['name'];	
		}
		
function get_tech_name($techp_id)
{
		$get_techs = mysql_query("SELECT * FROM users where id='$techp_id'")or die (mysql_error());		
		while($rows = mysql_fetch_array($get_techs))
		{
			$tech = $rows['name'];	
			return($tech);
		}
}

?>	
