<?php 
include('block_admin.php');
if($_GET['mode']=='save_view'){
	$paymentID=$_GET['paymentID'];

	include('dbconnect.php');
	mysql_query("UPDATE payment set view='yes',status='ok' where paymentID='$paymentID'");

	header('location:admin_index.php');
}


if($_GET['mode']=='not_okay'){
	$paymentID=$_GET['paymentID'];

	include('dbconnect.php');
	mysql_query("UPDATE payment set note='$_POST[note]',view='yes',status='not_ok' where paymentID='$paymentID'");

	header('location:admin_index.php');
}



if($_GET['mode']=='edit_not_okay'){
	$paymentID=$_GET['paymentID'];

	include('dbconnect.php');
	mysql_query("UPDATE payment set note='$_POST[note]',view='yes',status='not_ok' where paymentID='$paymentID'");

	header('location:admin_reports_daily.php');
}


if($_GET['mode']=='okay'){
	$paymentID=$_GET['paymentID'];

	include('dbconnect.php');
	mysql_query("UPDATE payment set view='yes',status='ok' where paymentID='$paymentID'");

	header('location:admin_reports_daily.php');
}






?>