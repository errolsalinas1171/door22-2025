<?php

include('dbconnect.php');	
$query1 = mysql_query("SELECT * FROM header WHERE title='$_POST[header]'");
if(mysql_num_rows($query1) != 0)
		{
		echo "<script language='Javascript'>
			alert('Header/Title Already Exist!');
			location.href='admin_settings_header.php';
			</script>";
			die . mysql_error();
		}

mysql_query("INSERT INTO header (date_inputted,title,enable)VALUES (NOW(),'$_POST[header]','no')");
echo "<script language='Javascript'>
			alert('Home Page Header Added');
			location.href='admin_settings_header.php';
			</script>";
			die . mysql_error();
mysql_close($con);

?> 
