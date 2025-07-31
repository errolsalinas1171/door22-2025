<?php 
include('dbconnect.php');

if(isset($_POST['edit']))
{
mysql_query("UPDATE receipt_header set header1='$_POST[header1]',header2='$_POST[header2]',header3='$_POST[header3]',header4='$_POST[header4]' WHERE receipt_headerID='1'");
	echo "<script language='Javascript'>
			alert('Receipt Header Updated');
			location.href='admin_settings_receipt_header.php';
			</script>";
			die . mysql_error();
}
?>
