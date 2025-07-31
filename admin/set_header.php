<?php
include('dbconnect.php');
$id=$_GET['headerID'];
if($_GET['mode']=='enable'){
mysql_query("UPDATE header set enable='yes' WHERE headerID='$id'");
mysql_close($con);
header('location:admin_settings_header.php');
}

if($_GET['mode']=='disable'){
mysql_query("UPDATE header set enable='no' WHERE headerID='$id'");
mysql_close($con);
header('location:admin_settings_header.php');
}
?> 
