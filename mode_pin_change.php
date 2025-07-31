<?php
include('dbconnect.php');
if(!$_POST['password'])
  		{
  			echo "<script language='Javascript'>
			alert('Please enter PIN Number');
			location.href='user_pin_change.php?userID=".$_POST['userID']."';
			</script>";
			die . mysql_error();
  		}

if(isset($_POST['edit']))
{	
	mysql_query("UPDATE users set password='$_POST[password]',date_updated=NOW() WHERE userID='$_POST[userID]'");
	echo "<script language='Javascript'>
			alert('PIN Number succesfully update');
			location.href='user_account.php';
			</script>";
			die . mysql_error();
}

?>