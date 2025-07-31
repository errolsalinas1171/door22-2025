<br><br>
<?php 
include('dbconnect.php');
$result = mysql_query("SELECT * FROM users WHERE user_type='admin'");
while($row = mysql_fetch_array($result))
  
{
$date_1=strtotime($row['date_added']);
$date_added=date("M/d/Y h:i A", $date_1);

if($row['date_updated']=='0000-00-00 00:00:00'){
$date_2=strtotime($row['date_added']);
$date_updated='NEVER';
}
if($row['date_updated']!='0000-00-00 00:00:00'){
$date_2=strtotime($row['date_added']);
$date_updated=date("M/d/Y h:i A", $date_2);
}

echo "
<input type='hidden' name='userID' value=".$row['userID'].">
<center>

<table border='0' width='100%'>
<tr>
<td><center><label>First Name</label></center><br></td>
<td width='5%'><center> : </center><br></td>
<td width='20%'><center>".$row['first_name']."</center><br></td>

<td><center><label>Middle Name</label></center><br></td>
<td width='5%'><center> : </center><br></td>
<td><center>".$row['middle_name']."</center><br></td>
</tr>
<tr>
<td><center><label>Last Name</label><br><br></center></td>
<td width='5%'><center> : </center><br></td>
<td width='20%'><center>".$row['last_name']."</center><br></td>

<td><center><label>Email Address</label><br><br></center></td>
<td width='5%'><center> : </center><br></td>
<td><center>".$row['email']."</center><br></td>
</tr>
<tr>
<td><center><label>Address</label><br><br></center></td>
<td width='5%'><center> : </center><br></td>
<td width='20%'><center>".$row['address']."</center><br></td>

<td><center><label>Contact #</label><br><br></center></td>
<td width='5%'><center> : </center><br></td>
<td><center>".$row['contact_number']."</center><br></td>
</tr>
<tr>
<td><center><label>Username</label><br><br></center></td>
<td width='5%'><center> : </center><br></td>
<td width='20%'><center>".$row['username']."</center><br></td>

<td><center><label>Password</label><br><br></center></td>
<td width='5%'><center> : </center><br></td>
<td><center>".$row['password']."</center><br></td>
</tr>
<tr>
<td><center><label>Date Added</label><br><br></center></td>
<td width='5%'><center> : </center><br></td>

<td width='20%'><center>".$date_added."</center><br></td>

<td><center><label>Date Updated</label><br><br></center></td>
<td width='5%'><center> : </center><br></td>
<td><center>".$date_updated."</center><br></td>
</tr>
</table><br><br>
<a href='mode_edit_user.php?mode=edit_admin&&userID=".$row['userID']."'><input type='button' class='btn btn-primary btn-md' name='edit' value='UPDATE ADMIN DETAILS'/></a>
</center>
 
 ";


 } 
 mysql_close($con); 
 ?>
 <br><br>