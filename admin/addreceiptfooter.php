<?php 
echo "<form action='editedreceiptfooter.php' method='post'>";
include('dbconnect.php');
$result = mysql_query("SELECT * FROM receipt_footer WHERE receipt_footerID='1'");
while($row = mysql_fetch_array($result))
  
{

echo"
<center>
<table border='0' width='90%'>
<tr>
<td><label>Footer Line 1</label><input type='text' class='form-control input-md' name='footer1' value='".$row['footer1']."'><br><br></td>
<td width='5%'></td>
</tr>
<tr>
<td><label>Footer Line 2</label><input type='text' class='form-control input-md' name='footer2' value='".$row['footer2']."'><br><br></td>
<td width='5%'></td>
</tr>
<tr>
<td><label>Footer Line 3</label><input type='text' class='form-control input-md' name='footer3' value='".$row['footer3']."'><br><br></td>
<td width='5%'></td>
</tr>
<tr>
<td><label>Footer Line 4</label><input type='text' class='form-control input-md' name='footer4' value='".$row['footer4']."'><br><br></td>
<td width='5%'></td>
</tr>
<tr>
<td><br><input type='submit' name='edit' class='btn btn-primary btn-md' value='   Save Footer   '/></td>
<td width='5%'></td>
</tr>
</table>
</center>
  
</form>";

 } 
 echo "</form>";
 mysql_close($con); 
 ?>
 <br><br>

