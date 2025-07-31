<?php
$con = mysql_connect("localhost","root","d0or22");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
mysql_select_db("door22_kiosk", $con);
?>
