<?php

include('dbconnect.php');

$productID=$_GET[productID];

mysql_query("DELETE FROM products WHERE productID='$productID'");

mysql_close($con);

header('location:admin_products.php');

?> 
