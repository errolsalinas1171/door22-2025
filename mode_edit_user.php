<?php 
include('block_admin.php');
if($_GET['mode']=='edit_user'){
	$userID=$_GET['userID'];
	include('dbconnect.php');
	mysql_query("UPDATE users set edit='yes' WHERE userID='$userID'");
	header('location:admin_user_update.php?userID='.$_GET['userID'].'');
}

if($_GET['mode']=='edit_admin'){
	$userID=$_GET['userID'];
	include('dbconnect.php');
	mysql_query("UPDATE users set edit='yes' WHERE userID='$userID'");
	header('location:admin_settings_update.php?userID='.$_GET['userID'].'');
}

?>
