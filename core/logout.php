<?php

					setcookie("user", $userget, time()-36000); 
					setcookie("pass", $passgetg, time()-36000);


				$message = "You are now logged out!";
				include('./html/message.html');	
					
					?>
					<META META HTTP-EQUIV=Refresh CONTENT="1; URL=index.php">
					<?php






?>