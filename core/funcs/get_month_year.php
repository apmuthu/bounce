<select name="month" id="month">
  <option value="01">Jan</option>
  <option value="02">Feb</option>
  <option value="03">Mar</option>
  <option value="04">Apr</option>
  <option value="05">May</option>
  <option value="06">Jun</option>
  <option value="07" selected>Jul</option>
  <option value="08">Aug</option>
  <option value="09">Sept</option>
  <option value="10">Oct</option>
  <option value="11">Nov</option>
  <option value="12">Dec</option>

</select> 
<select name="year" id="year">
<?php
$year = date("Y");
$year1 = $year + 1;
$year2 = $year - 1;
  echo "<option value=\"$year\" selected=\"selected\">$year</option>";
  echo "<option value=\"$year1\">$year1</option>";
  echo "<option value=\"$year2\" >$year2</option>";

?>
</select>
