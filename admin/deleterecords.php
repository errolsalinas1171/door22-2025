<?php

include('dbconnect.php');

$paymentID=$_GET[paymentID];

mysql_query("DELETE FROM payment WHERE paymentID='$paymentID'");

mysql_close($con);

header('location:admin_index.php');

?> 
