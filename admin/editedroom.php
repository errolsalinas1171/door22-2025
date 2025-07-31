<?php 
include('dbconnect.php');
$query1 = mysql_query("SELECT * FROM rooms WHERE room_no='$_POST[room_no]' && edit='no'");
if(mysql_num_rows($query1) != 0)
		{
		echo "<script language='Javascript'>
			alert('Room Number already in use');
			location.href='admin_room_edit.php?roomID=$_POST[roomID]';
			</script>";
			die . mysql_error();
		}
		
if(isset($_POST['edit']))
{

	if(!$_POST['room_no'])
  		{
  			echo "<script language='Javascript'>
			alert('Please enter Room Number');
			location.href='admin_room_edit.php?roomID=$_POST[roomID]';
			</script>";
			die . mysql_error();
  		}


mysql_query("UPDATE rooms set room_no='$_POST[room_no]',room_price='$_POST[room_price]',description='$_POST[description]',edit='no' WHERE roomID='$_POST[roomID]'");
	echo "<script language='Javascript'>
			alert('Room Details Updated');
			location.href='admin_room.php';
			</script>";
			die . mysql_error();
}

?>