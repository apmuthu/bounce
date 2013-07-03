<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPBounce Installer V1.2</title>
<style type="text/css">
<!--
.style33 {font-size: 10pt; font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #FFFFFF; }
.style35 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
}
.style36 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>
</head>

<body>
 <p class="style36">PHPBounce Installer V1.1</p>
 <p class="style36">Here is some information that we need to setup the database and configuration files:<br />
   <br />
 </p>
<form id="form1" name="form1" method="post" action="install.php">
  <table width="529" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
     <tr>
       <td width="203" bgcolor="#656A96"><span class="style33">&nbsp;MySQL Server</span></td>
       <td width="323" bgcolor="#FFFFFF" class="style35"><label>
         <input type="text" name="hostname" id="hostname" />
       ( localhost / 192.168.1.44 / somehost.com )</label></td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Username:</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="username" id="username" /> 
       (Your MySQL Server Username)</td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Password:</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="password" id="password" /> </td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Database Name</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="database" id="database" /> 
       (The Database to use for this install)</td>
     </tr>
     <tr>
       <td height="2" colspan="2" bgcolor="#333333">&nbsp;</td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Organization Name</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="orgname" id="orgname" /></td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Tel Phone #</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="phone" id="phone" /> </td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Address</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="address" id="address" /></td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;City</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="city" id="city" /></td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Postal Code</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="zip" id="zip" /></td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;State</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input name="state" type="text" id="state" size="4" maxlength="2" />
       (FL / NY / NJ / AL...)</td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Country</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="country" id="country" /> 
       (United States)</td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Tax Rate (Florida is 0.07)</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input name="tax" type="text" id="tax" size="10" maxlength="5" /> 
       (0.05)</td>
     </tr>
     <tr>
       <td height="2" colspan="2" bgcolor="#333333">&nbsp;</td>
     </tr>
     <tr>
       <td height="48" colspan="2" bgcolor="#FFFFFF"><div align="center"><img src="../images/checkout_logo.gif" width="242" height="40" /></div></td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Google Checkout Merchant ID</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="merchantid" id="orgname3" /> 
         <a href="http://checkout.google.com/sell">http://checkout.google.com/sell</a></td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Merchant Key</span></td>
       <td bgcolor="#FFFFFF" class="style35"><input type="text" name="merchantkey" id="phone3" />       </td>
     </tr>
     <tr>
       <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
     </tr>
     <tr>
       <td colspan="2" bgcolor="#333333">&nbsp;</td>
     </tr>
     <tr>
       <td bgcolor="#656A96"><span class="style33">&nbsp;Admin Email</span></td>
       <td bgcolor="#FFFFFF"><span class="style35">
        <input type="text" name="email" id="email" /> 
       (abc@somedomain.com)</span></td>
     </tr>
     <tr>
       <td height="28" colspan="2" align="right" bgcolor="#E48945"><label>
         <input type="submit" name="button" id="button" value="Run Install Script" />
       </label> &nbsp;</td>
     </tr>
   </table>
</form>
 <p><br />
 </p>
</body>



</html>
