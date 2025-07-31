<?php 
include('dbconnect.php');

if(isset($_POST['edit']))
{
mysql_query("UPDATE receipt_footer set footer1='$_POST[footer1]',footer2='$_POST[footer2]',footer3='$_POST[footer3]',footer4='$_POST[footer4]' WHERE receipt_footerID='1'");
	echo "<script language='Javascript'>
			alert('Receipt Footer Updated');
			location.href='admin_settings_receipt_footer.php';
			</script>";
			die . mysql_error();
}
?>