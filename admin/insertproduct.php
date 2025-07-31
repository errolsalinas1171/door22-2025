<?php

include('dbconnect.php');	

$query1 = mysql_query("SELECT * FROM products WHERE product_code='$_POST[product_code]'");
if(mysql_num_rows($query1) != 0)
{
	echo "<script language='Javascript'>
	alert('Product Code/SKU already exist!');
	location.href='admin_products_add.php';
	</script>";
	die . mysql_error();
}

/* For Image Thumbnail upload */
$filename = $_FILES["product_img"]["name"];
$tempname = $_FILES["product_img"]["tmp_name"];

$folder = "images/products/".$filename;

mysql_query("INSERT INTO products (product_img,product_name,product_code,product_description,product_price,date_added,product_status)
VALUES ('$filename','$_POST[product_name]','$_POST[product_code]','$_POST[product_description]','$_POST[product_price]',NOW(),'enabled')");

/** Move the image to the upload folder **/
if (move_uploaded_file($tempname, $folder)) {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}

echo "<script language='Javascript'>
		location.href='admin_products_add.php';
	  </script>";
	  die . mysql_error();
mysql_close($con);

?> 
