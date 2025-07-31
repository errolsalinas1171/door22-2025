<?php
session_start();
include("dbconnect.php");

$username=$_POST['username']; 
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE username='$username' and password='$password' ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1) 
{
while($row = mysql_fetch_array($result))
	  {
			$_SESSION['username'] = 'username';
			$_SESSION['password'] = 'password';
			$_SESSION['userID'] = "$row[userID]";
			$_SESSION['user_type'] = "$row[user_type]";
			$_SESSION['in_use'] = "$row[in_use]";
			
		if($row['user_type']=="admin")
	 	 {	
		 mysql_query("UPDATE users SET in_use='yes' WHERE username ='$username'");				
			header("location:admin_index.php");
			
		 }		
		else if($row['user_type']=="user")
	 	 {		
		$frontdesk=mysql_query("SELECT * FROM users WHERE userID=$row[userID] AND active='no'");
		$res=mysql_num_rows($frontdesk);
			if($res==0)
			{
				mysql_query("UPDATE tbl_login SET in_use='yes' WHERE username ='$username'");
				 header("location:user_index.php"); 
			}
			
			if($res>0)
			{ 
			echo "<script language='Javascript'>
			alert('Failed to Login, This Account has been Disabled by the Admin.');
			location.href='logout.php';
			</script>";
			die . mysql_error(); }
		 }
	
 	}
}		
else
{
header("location:login_fail.php");
}

?>

