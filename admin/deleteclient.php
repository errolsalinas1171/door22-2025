<?php

include('dbconnect.php');

$userID=$_GET[userID];

mysql_query("DELETE FROM users WHERE userID='$userID'");

mysql_close($con);

header('location:admin_user_display.php');

?> 
