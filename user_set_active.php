<?php
include('dbconnect.php');
$userID=$_GET['userID'];
if($_GET['mode']=='disable'){
mysql_query("UPDATE users set active='yes' WHERE userID='$userID'");
mysql_close($con);
header('location:admin_user_display.php');
}
if($_GET['mode']=='enable'){
mysql_query("UPDATE users set active='no' WHERE userID='$userID'");
mysql_close($con);
header('location:admin_user_display.php');
}
?> 
