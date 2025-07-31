<?php 
include('dbconnect.php');
$query1 = mysql_query("SELECT * FROM users WHERE username='$_POST[username]' && edit='no'");
if(mysql_num_rows($query1) != 0)
		{
		echo "<script language='Javascript'>
			alert('Account Number already in use');
			location.href='admin_user_update.php?userID=$_POST[userID]';
			</script>";
			die . mysql_error();
		}
		
if(isset($_POST['edit']))
{
	if($_POST['password2']!=$_POST['password'])
		{
		echo "<script language='Javascript'>
			alert('Password not Match');
			location.href='admin_user_update.php?userID=$_POST[userID]';
			</script>";
			die . mysql_error();
		}	
mysql_query("UPDATE users set first_name='$_POST[fname]',middle_name='$_POST[mname]',last_name='$_POST[lname]',company_name='$_POST[company_name]',address='$_POST[address]',email='$_POST[email]',contact_number='$_POST[contact]',username='$_POST[username]',password='$_POST[password]',edit='no',date_updated=NOW() WHERE userID='$_POST[userID]'");
	echo "<script language='Javascript'>
			alert('Client Details Updated');
			location.href='admin_user_display.php';
			</script>";
			die . mysql_error();
}
?>