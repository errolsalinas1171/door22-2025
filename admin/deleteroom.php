<?php

include('dbconnect.php');

$roomID=$_GET[roomID];

mysql_query("DELETE FROM rooms WHERE roomID='$roomID'");

mysql_close($con);

header('location:admin_room.php');

?> 
