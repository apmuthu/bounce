<?php

include('../connect.php');




		$tik_notes = mysql_query("SELECT * FROM ticket_notes WHERE ticket_id='$tid'")or die (mysql_error());		
		while($row_notes = mysql_fetch_array($tik_notes))
		{
			$r_notes = fixsafe($row_notes[notes]);
			echo "============================\n";
			echo  date("m-d-Y", strtotime($row_notes['dtime'])) ." | " . $row_notes[time] . "\n" . $row_notes[tech_name]. "\n---------------------\n\n" .$r_notes;
			
			echo "\n\n============================\n\n\n";
		}
		
		


?>