<?php 
include('block_admin.php');    
include('dbconnect.php');    

/* For Image Thumbnail upload */
$filename = $_FILES["product_img"]["name"];
$tempname = $_FILES["product_img"]["tmp_name"];

$folder = "images/products/".$filename;

/** Get ProductID **/
$productID = $_POST['productID'];

if(isset($_POST['edit']))
	{
		mysql_query("UPDATE products set product_img='$filename' WHERE productID='$productID'");

		/** Move the image to the upload folder **/
		if (move_uploaded_file($tempname, $folder)) {
		    $msg = "Image uploaded successfully";
		}else{
		    $msg = "Failed to upload image";
		}

		echo "<script language='Javascript'>
		alert('You have successfully updated the product image.');
		location.href='admin_products.php';
		</script>";
		die . mysqli_error();

	}
?>
