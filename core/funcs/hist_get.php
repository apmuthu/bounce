<?php
		$get_hist = mysql_query("SELECT * FROM users WHERE id='$tech_id'")or die (mysql_error());		
		while($row_hist = mysql_fetch_array($get_hist))
		{
			$back_page = $row_hist[hist];
		}
			
					echo "<META META HTTP-EQUIV=Refresh CONTENT=\"1; URL=$back_page\">";
					
?>