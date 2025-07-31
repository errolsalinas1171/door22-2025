<?php

include('dbconnect.php');	
$query1 = mysql_query("SELECT * FROM users WHERE username='$_POST[username]'");
if(mysql_num_rows($query1) != 0)
		{
		echo "<script language='Javascript'>
			alert('Account Number Already Exist!');
			location.href='admin_user_add.php';
			</script>";
			die . mysql_error();
		}

if($_POST['password2']!=$_POST['password'])
		{
		echo "<script language='Javascript'>
			alert('Pin Number not Match!');
			location.href='admin_user_add.php';
			</script>";
			die . mysql_error();
		}

mysql_query("INSERT INTO users (first_name,middle_name,last_name,company_name,contact_number,email,address,username,password,date_added,date_updated,user_type,in_use,active,edit,assigned)
VALUES ('$_POST[fname]','$_POST[mname]','$_POST[lname]','$_POST[company_name]','$_POST[contact]','$_POST[email]','$_POST[address]','$_POST[username]','$_POST[password]',NOW(),NOW(),'user','no','yes','no','no')");
echo "<script language='Javascript'>
			alert('Client Added');
			location.href='admin_user_add.php';
			</script>";
			die . mysql_error();
mysql_close($con);

?> 
