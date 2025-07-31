<?php 
include('block_user.php');
include('dbconnect.php');

if($_GET['mode']=='product'){
	
	$productID = $_POST['productID'];
	$productQty = $_POST['product_qty'];
	$userID = $_SESSION['userID'];

	/** Get Product's details **/
	$product = mysql_query("SELECT * FROM products WHERE productID='$productID'");
    $productDetails = mysql_fetch_array($product);
    $productName = $productDetails['product_name'];
    $productPrice = $productDetails['product_price'];

	/** Check if there is an existing transaction on the Transaction table **/
	$trans = mysql_query("SELECT * FROM transaction WHERE userID='$userID' AND type='product' AND status='pending'");
    $transCount = mysql_num_rows($trans);
    $transDetails = mysql_fetch_array($trans);
    $transID = $transDetails['transID'];

    if($transCount > 0){
		mysql_query("INSERT INTO transaction_products (transID,userID,productID,product_name,product_price,product_qty,date_created,print,status)VALUES ('$transID','$userID','$productID','$productName','$productPrice','$productQty',NOW(),'no','pending')");

		include('print_product.php');
		include('print_product_2.php');

		mysql_query("UPDATE transaction_products set print='yes' WHERE print='no'");

		echo "<script language='Javascript'>
			alert('Product successfully added!');
			location.href='print_product.php';
			</script>";
			die . mysql_error();
    }else{
		mysql_query("INSERT INTO transaction (userID,type,date_created,status)VALUES ('$userID','product',NOW(),'pending')");
		$transID = mysql_insert_id($con);
		mysql_query("INSERT INTO transaction_products (transID,userID,productID,product_name,product_price,product_qty,date_created,print,status)VALUES ('$transID','$userID','$productID','$productName','$productPrice','$productQty',NOW(),'no','pending')");

		include('print_product.php');
		include('print_product_2.php');

		mysql_query("UPDATE transaction_products set print='yes' WHERE print='no'");

		echo "<script language='Javascript'>
			alert('Product successfully added!');
			location.href='print_product.php';
			</script>";
			die . mysql_error();
    }
}


if($_GET['mode']=='wifi'){
	
	$voucherID = $_GET['voucherID'];
	$voucherQty = 1;
	$userID = $_SESSION['userID'];

	/** Get Product's details **/
	$wifi = mysql_query("SELECT * FROM wifi_vouchers WHERE voucherID='$voucherID'");
    $wifiDetails = mysql_fetch_array($wifi);
    $voucherName = $wifiDetails['wifi_voucher'];
    $voucherCode = $wifiDetails['wifi_voucher_code'];
    $voucherDays = $wifiDetails['wifi_voucher_days'];
    $voucherPrice = $wifiDetails['wifi_price'];

	/** Check if there is an existing transaction on the Transaction table **/
	$trans = mysql_query("SELECT * FROM transaction WHERE userID='$userID' AND type='wifi' AND status='pending'");
    $transCount = mysql_num_rows($trans);
    $transDetails = mysql_fetch_array($trans);
    $transID = $transDetails['transID'];

    if($transCount > 0){

		mysql_query("INSERT INTO transaction_wifi (transID,userID,voucherID,wifi_voucher,wifi_voucher_code,wifi_voucher_days,wifi_price,wifi_qty,date_created,print,status)VALUES ('$transID','$userID','$voucherID','$voucherName','$voucherCode','$voucherDays','$voucherPrice','$voucherQty',NOW(),'no','pending')");

		mysql_query("UPDATE wifi_vouchers set voucher_status='used',is_added=1 WHERE voucherID='$voucherID'");

		include('print_wifi.php');
		include('print_wifi_2.php');

		mysql_query("UPDATE transaction_wifi set print='yes' WHERE print='no'");

		echo "<script language='Javascript'>
			alert('Wifi Voucher successfully added!');
			location.href='user_products_wifi_add.php';
			</script>";
			die . mysql_error();
    }else{

		mysql_query("INSERT INTO transaction (userID,type,date_created,status)VALUES ('$userID','wifi',NOW(),'pending')");
		$transID = mysql_insert_id($con);

		mysql_query("INSERT INTO transaction_wifi (transID,userID,voucherID,wifi_voucher,wifi_voucher_code,wifi_voucher_days,wifi_price,wifi_qty,date_created,print,status)VALUES ('$transID','$userID','$voucherID','$voucherName','$voucherCode','$voucherDays','$voucherPrice','$vocuherQty',NOW(),'no','pending')");

		mysql_query("UPDATE wifi_vouchers set voucher_status='used',is_added=1 WHERE voucherID='$voucherID'");

		include('print_wifi.php');
		include('print_wifi_2.php');

		mysql_query("UPDATE wifi_vouchers set print='yes' WHERE print='no'");

		echo "<script language='Javascript'>
			alert('Wifi Voucher successfully added!');
			location.href='user_products_wifi_add.php';
			</script>";
			die . mysql_error();
    }
}
?>