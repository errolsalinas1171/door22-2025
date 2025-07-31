<?php
include("dbconnect.php");
$id=$_SESSION['userID'];
$r=mysql_fetch_array(mysql_query("SELECT userID from users WHERE userID='$id'"));
$userID=$r['userID'];

$sql="UPDATE users SET in_use='no' WHERE userID='$userID'";
$result=mysql_query($sql);

$sql_update="UPDATE payment SET print='yes' where print='no'";
$result=mysql_query($sql_update);
session_start();
session_destroy();
header("location:index.php");
?>
