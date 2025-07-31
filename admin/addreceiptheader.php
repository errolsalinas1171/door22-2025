<?php 
echo "<form action='editedreceiptheader.php' method='post'>";
include('dbconnect.php');
$result = mysql_query("SELECT * FROM receipt_header WHERE receipt_headerID='1'");
while($row = mysql_fetch_array($result))
  
{

echo"
<center>
<table border='0' width='90%'>
<tr>
<td><label>Header Line 1</label><input type='text' class='form-control input-md' name='header1' required value='".$row['header1']."'><br><br></td>
<td width='5%'></td>
</tr>
<tr>
<td><label>Header Line 2</label><input type='text' class='form-control input-md' name='header2' required value='".$row['header2']."'><br><br></td>
<td width='5%'></td>
</tr>
<tr>
<td><label>Header Line 3</label><input type='text' class='form-control input-md' name='header3' value='".$row['header3']."'><br><br></td>
<td width='5%'></td>
</tr>
<tr>
<td><label>Header Line 4</label><input type='text' class='form-control input-md' name='header4' value='".$row['header4']."'><br><br></td>
<td width='5%'></td>
</tr>
<tr>
<td><br><input type='submit' name='edit' class='btn btn-primary btn-md' value='   Save Header   '/></td>
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

