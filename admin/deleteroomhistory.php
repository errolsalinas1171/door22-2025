<?php

include('dbconnect.php');

$historyID=$_GET[historyID];

mysql_query("DELETE FROM room_history WHERE historyID='$historyID'");

mysql_close($con);

header('location:admin_room_history.php');

?> 
