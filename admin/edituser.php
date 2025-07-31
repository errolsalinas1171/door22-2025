<?php 
echo "<form action='editeduser.php' method='post'>";
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
<td><label>First Name</label><input type='text' class='form-control input-md' name='fname' value=".$row['first_name']."><br></td>
<td width='5%'></td>
<td><label>Middle Name</label><input type='text' class='form-control input-md' name='mname' value=".$row['middle_name']."><br></td>
</tr>
<tr>
<td><label>Last Name</label><input type='text' class='form-control input-md' name='lname' value=".$row['last_name']."><br></td>
<td width='5%'></td>
<td><label>Address</label><input type='text' class='form-control input-md' name='address' value=".$row['address']."><br></td>
</tr>
<tr>
<td><label>Company Name</label><input type='text' class='form-control input-md' name='company_name' value=".$row['company_name']."><br></td>
<td width='5%'></td>
<td><label>Email Address</label><input type='email' class='form-control input-md' name='email' value=".$row['email']."><br></td>
</tr>
<tr>
<td><label>Contact #</label><input type='text' class='form-control input-md' name='contact' value=".$row['contact_number']."><br></td>
<td width='5%'></td>
<td><label>Account Number</label><input type='text' maxlength='6' class='form-control input-md' name='username' required value=".$row['username']."><br></td>
</tr>
<tr>
<td><label>PIN Number</label><input type='password' maxlength='6' class='form-control input-md' name='password' required placeholder='PIN Number' value=''><br></td>
<td width='5%'></td>
<td><label>Confirm PIN Number</label><input type='password' maxlength='6' class='form-control input-md' name='password2' placeholder='Confirm PIN Number' required value=''><br></td>
</tr>
<tr>
<td><br><input type='submit' class='btn btn-primary btn-md' name='edit' value='UPDATE USER DETAILS'/></td>
<td width='5%'></td>
<td></td>
</tr>
</table>
</center>
  ";


 } 
 echo "</form>";
 mysql_close($con); 
 ?>
 <br><br>