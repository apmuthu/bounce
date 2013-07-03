<?php  
  
   function safe($value)
   { 
      return mysql_real_escape_string($value); 
   } 
   
   function fixsafe($value)
   {
   	  return stripslashes($value);
   }
 ?>
 