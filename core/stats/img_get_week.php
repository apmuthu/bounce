<?php

header ("Content-type: image/png");
$im = @imagecreate(300, 240)
   or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 230, 230, 230);
$line_color = imagecolorallocate($im, 0, 0, 0);
$line_color2 = imagecolorallocate($im, 199, 199, 199); 
$text_color = imagecolorallocate($im, 77, 62, 253);


$f = 50; 

//Graph Ratio
$h = 1.2;



//JAN
$j = mnth_gt(01);
$lvl = $h * $j;
$lvl = 200 - round($lvl);

$x_pos = 12;

 imagestring($im, 10, $x_pos, 202, "J", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$j", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color);
 imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color);
 
 
 
//FEB 
$f = mnth_gt(02);
$lvl = $h * $f;
$lvl = 200 - round($lvl);
$x_pos = 36;

 imagestring($im, 10, $x_pos, 202, "F", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$f", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color); 
 imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color);


//MAR 60  
$m = mnth_gt(03);
$lvl = $h * $m;
$lvl = 200 - round($lvl);
$x_pos = 60;

 imagestring($im, 10, $x_pos, 202, "M", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$m", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color); 
 imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color);
 
 
//APR 84  
$a = mnth_gt(04);
$lvl = $h * $a;
$lvl = 200 - round($lvl);
$x_pos = 84;

 imagestring($im, 10, $x_pos, 202, "A", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$a", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color); 
  imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color);
	
	
//MAY 108
$mm = mnth_gt(05);
$lvl = $h * $mm;
$lvl = 200 - round($lvl);
$x_pos = 108;

 imagestring($im, 10, $x_pos, 202, "M", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$mm", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color);
  imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color); 
  
  
//JUN 132
$jn = mnth_gt(06);
$lvl = $h * $jn;
$lvl = 200 - round($lvl);
$x_pos =132;

 imagestring($im, 10, $x_pos, 202, "J", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$jn", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color);
  imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color); 
  
	  
//JUL 156	  
$jl = mnth_gt(07);
$lvl = $h * $jl;
$lvl = 200 - round($lvl);
$x_pos =156;

 imagestring($im, 10, $x_pos, 202, "J", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$jl", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color); 
  imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color);
  
  
//AUG 180
$ag = mnth_gt(8);
$lvl = $h * $ag;
$lvl = 200 - round($lvl);
$x_pos = 180;

 imagestring($im, 10, $x_pos, 202, "A", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$ag", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color); 
 imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color);
		

//SEP 204	
$s = mnth_gt(9);
$lvl = $h * $s;
$lvl = 200 - round($lvl);
$x_pos = 204;

 imagestring($im, 10, $x_pos, 202, "S", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$s", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color);
  imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color); 
  
		 
//OCT	228	 
$o = mnth_gt(10);
$lvl = $h * $o;
$lvl = 200 - round($lvl);
$x_pos = 228;

 imagestring($im, 10, $x_pos, 202, "O", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$o", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color); 
  imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color);
  
		  
//NOV	252	  
$n = mnth_gt(11);
$lvl = $h * $n;
$lvl = 200 - round($lvl);
$x_pos = 252;

 imagestring($im, 10, $x_pos, 202, "N", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$n", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color);
  imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color); 


//DEC	276	   
$d = mnth_gt(12);
$lvl = $h * $d;
$lvl = 200 - round($lvl);
$x_pos = 276;

 imagestring($im, 10, $x_pos, 202, "D", $text_color);
 imagestring($im, 10, $x_pos, $lvl-15, "$d", $text_color);
 imageline($im, $x_pos, $lvl, $x_pos, 200, $line_color);
 imageline($im, $x_pos+1, $lvl, $x_pos+1, 200, $line_color);
 imageline($im, $x_pos+2, $lvl, $x_pos+2, 200, $line_color);
 imageline($im, $x_pos+3, $lvl, $x_pos+3, 200, $line_color);
 imageline($im, $x_pos+4, $lvl, $x_pos+4, 200, $line_color);
  imageline($im, $x_pos+6, $lvl, $x_pos+6, 200, $line_color); 
			
			
//TOP
imageline($im, 5, 5, 295, 5, $line_color); 
//RIGHT
imageline($im, 5, 5, 5, 200, $line_color);
//BOTTOM
imageline($im, 295, 200, 5, 200, $line_color);
//TOP
imageline($im, 295 , 200, 295, 5, $line_color);

imagepng($im);



imagedestroy($im);





function mnth_gt($gt_month)
{
	
include('./connect.php');
include('./auth.php');
	
	$this_mo = $gt_month;	
	$this_yr = date("Y");
	
	
		
$endmonth = $this_yr."-".$this_mo."-31";
$begmonth = $this_yr."-".$this_mo."-01";



$total_hours = 0;

		$weekly = mysql_query("SELECT * FROM timesheets WHERE techid = $tech_id AND daterec <= '$endmonth'  AND daterec >= '$begmonth' ORDER BY daterec")or die (mysql_error());		
		while($row = mysql_fetch_array($weekly))
		{
			$total_hours = $total_hours + $row['hours'];
		}
		return($total_hours);
}

?>