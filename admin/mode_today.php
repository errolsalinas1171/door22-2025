<?php 
include('block_admin.php');
if(isset($_POST['all_okay']))
{
	$paymentID=$_GET['paymentID'];

	include('dbconnect.php');
	mysql_query("UPDATE payment set note='$_POST[note]',view='yes',status='ok' where paymentID='$paymentID'");

	header('location:admin_display_reports_all.php');
}


if(isset($_POST['all_not_okay']))
{
	$paymentID=$_GET['paymentID'];

	include('dbconnect.php');
	mysql_query("UPDATE payment set note='$_POST[note]',view='yes',status='not_ok' where paymentID='$paymentID'");

	header('location:admin_display_reports_all.php');
}



if(isset($_POST['okay']))
{
	$paymentID=$_GET['paymentID'];

	include('dbconnect.php');
	mysql_query("UPDATE payment set note='$_POST[note]',view='yes',status='ok' where paymentID='$paymentID'");

	header('location:admin_index.php');
}


if(isset($_POST['not_okay']))
{
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