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



if($_GET['mode']=='edit_room'){
	$roomID=$_GET['roomID'];
	include('dbconnect.php');
	mysql_query("UPDATE rooms set edit='yes' WHERE roomID='$roomID'");
	header('location:admin_room_edit.php?roomID='.$_GET['roomID'].'');
}


if($_GET['mode']=='room_assign_client'){
	$historyID=$_GET['historyID'];
	$userID=$_GET['userID'];
	$roomID=$_GET['roomID'];
	include('dbconnect.php');
	
	if($historyID==0){
	mysql_query("INSERT INTO room_history (roomID,userID,date_start,status,view)
	VALUES ('$roomID','$userID',NOW(),'active','no')");
	$historyID=mysql_insert_id();
	mysql_query("UPDATE rooms set userID='$userID',status='occupied',historyID='$historyID' WHERE roomID='$roomID'");
	mysql_query("UPDATE users set assigned='yes' WHERE userID='$userID'");
	mysql_close($con);
	header('location:admin_room.php');
	}

	else if($historyID!=0){
	mysql_query("UPDATE room_history set date_end=NOW(),status='out',view='no' WHERE historyID='$historyID' && status='active'");

	mysql_query("INSERT INTO room_history (roomID,userID,date_start,status,view)
	VALUES ('$roomID','$userID',NOW(),'active','no')");
	$historyID=mysql_insert_id();

	mysql_query("UPDATE rooms set userID='$userID',status='occupied',historyID='$historyID' WHERE roomID='$roomID'");

	mysql_query("UPDATE users set assigned='yes' WHERE userID='$userID'");
	header('location:admin_room.php');
	mysql_close($con);
	}
}


if($_GET['mode']=='out_room'){
	$roomID=$_GET['roomID'];
	$userID=$_GET['userID'];
	include('dbconnect.php');
	mysql_query("UPDATE room_history set date_end=NOW(),status='out',view='yes' WHERE roomID='$roomID' && view='no' && status='active'");

	mysql_query("UPDATE users set assigned='no' WHERE userID='$userID'");

	mysql_query("UPDATE rooms set userID='0',status='available' WHERE roomID='$roomID'");

	header('location:admin_room.php');
}


if($_GET['mode']=='product_enable'){
	$productID=$_GET['productID'];
	include('dbconnect.php');
	mysql_query("UPDATE products set product_status='disabled' WHERE productID='$productID'");
	header('location:admin_products.php');
}


if($_GET['mode']=='product_disable'){
	$productID=$_GET['productID'];
	include('dbconnect.php');
	mysql_query("UPDATE products set product_status='enabled' WHERE productID='$productID'");
	header('location:admin_products.php');
}


if($_GET['mode']=='wifi_enable'){
	$voucherID=$_GET['voucherID'];
	include('dbconnect.php');
	mysql_query("UPDATE wifi_vouchers set voucher_status='disabled' WHERE voucherID='$voucherID'");
	header('location:admin_wifi.php');
}


if($_GET['mode']=='wifi_disable'){
	$voucherID=$_GET['voucherID'];
	include('dbconnect.php');
	mysql_query("UPDATE wifi_vouchers set voucher_status='enabled' WHERE voucherID='$voucherID'");
	header('location:admin_wifi.php');
}



?>
