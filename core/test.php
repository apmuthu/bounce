<?php
  $lines = file('http://www.exitbs.com/phpbounce/updates.html');

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($lines as $line_num => $line) {
    echo $line;
}

?>