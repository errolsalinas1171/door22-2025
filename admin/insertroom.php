<?php

include('dbconnect.php');	
$query1 = mysql_query("SELECT * FROM rooms WHERE room_no='$_POST[room_no]'");
if(mysql_num_rows($query1) != 0)
		{
		echo "<script language='Javascript'>
			alert('Room Number Already Exist!');
			location.href='admin_room_add.php';
			</script>";
			die . mysql_error();
		}

if(!$_POST['room_no'])
  		{
  			echo "<script language='Javascript'>
			alert('Please enter Room Number');
			location.href='admin_room_add.php';
			</script>";
			die . mysql_error();
  		}

mysql_query("INSERT INTO rooms (room_no,room_price,description,userID,date_added,status,edit,historyID)
VALUES ('$_POST[room_no]','$_POST[room_price]','$_POST[description]','0',NOW(),'available','no','0')");
echo "<script language='Javascript'>
			alert('Room Added');
			location.href='admin_room_add.php';
			</script>";
			die . mysql_error();
mysql_close($con);

?> 
