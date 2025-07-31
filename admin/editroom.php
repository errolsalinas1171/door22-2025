<?php 
echo "<form action='editedroom.php' method='post'>";
include('dbconnect.php');
$roomID=$_GET['roomID'];
$result = mysql_query("SELECT * FROM rooms WHERE roomID='$roomID'");
while($row = mysql_fetch_array($result))
  
{

echo "
<input type='hidden' name='roomID' value=".$row['roomID'].">
<center>
<table border='0' width='90%'>
<tr>
<td><label>Room Number</label><input type='text' class='form-control input-md' name='room_no' value='".$row['room_no']."'><br></td>
</tr>
<tr>
<td><label>Room Price</label><input type='text' class='form-control input-md' name='room_price' value='".$row['room_price']."'><br></td>
</tr>
<tr>
<td><label>Description</label><input type='text' class='form-control input-md' name='description' value='".$row['description']."'><br></td>
</tr>
<tr>
<td><br><input type='submit' class='btn btn-primary btn-md' name='edit' value='UPDATE ROOM DETAILS'/></td>
</tr>
</table>
</center>
  ";


 } 
 echo "</form>";
 mysql_close($con); 
 ?>
 <br><br>