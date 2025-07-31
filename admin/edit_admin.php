<?php 
echo "<form action='edited_admin.php' method='post'>";
include('dbconnect.php');
$userID=$_GET['userID'];
$result = mysql_query("SELECT * FROM users WHERE userID='$userID'");
while($row = mysql_fetch_array($result))
  
{

echo "
<input type='hidden' name='userID' value=".$row['userID'].">
<center>
<table border='0' width='90%'>
<tr>
<td><label>First Name</label><input type='text' class='form-control input-md' name='fname' required value=".$row['first_name']."></td>
<td width='5%'></td>
<td><label>Middle Name</label><input type='text' class='form-control input-md' name='mname' required value=".$row['middle_name']."></td>
</tr>
<tr>
<td><label>Last Name</label><input type='text' class='form-control input-md' name='lname' required value=".$row['last_name']."></td>
<td width='5%'></td>
<td><label>Address</label><input type='text' class='form-control input-md' name='address' required value=".$row['address']."></td>
</tr>
<tr>
<td><label>Email Address</label><input type='email' class='form-control input-md' name='email' required value=".$row['email']."></td>
<td width='5%'></td>
<td><label>Contact #</label><input type='text' class='form-control input-md' name='contact' required value=".$row['contact_number']."></td>
</tr>
<tr>
<td><label>Username</label><input type='text' class='form-control input-md' name='username' required value=".$row['username']."></td>
<td width='5%'></td>
<td><label>PIN Number</label><input type='password' class='form-control input-md' name='password' required placeholder='PIN Number' value=''></td>
</tr>
<tr>
<td><label>Confirm PIN Number</label><input type='password' class='form-control input-md' name='password2' placeholder='Confirm PIN Number' required value=''></td>
<td width='5%'></td>
<td><br><input type='submit' class='btn btn-primary btn-md' name='edit' value='UPDATE'/></td>
</tr>
</table>
</center>
  ";


 } 
 echo "</form>";
 mysql_close($con); 
 ?>
 <br><br>