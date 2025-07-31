<?php 
include('block_user.php');
if($_GET['mode']=='save'){
	$fullname=$_GET['fullname'];
	$envelop_no=$_GET['envelop_no'];
	$username=$_GET['username'];
	$amount=$_GET['amount'];
	$type=$_GET['type'];

	/** New Updates for product and wifi add ons | October 2022**/
	$transProdID = $_GET['transProdID'];
	$transWifiID = $_GET['transWifiID'];
	$total = $_GET['total'];

	include('dbconnect.php');
	mysql_query("INSERT INTO payment (userID,full_name,envelop_no,amount,transaction,payment_type,cheque_number,date_time,account_number,note,print,view,status)VALUES ('$_SESSION[userID]','$fullname','$envelop_no','$amount','billing','$type','',NOW(),'$username','','no','no','pending')");
	$paymentID = mysql_insert_id($con);

	/** New Updates for product and wifi add ons | October 2022**/
	if($transProdID > 0){
		mysql_query("UPDATE transaction set paymentID='$paymentID',total='$total',status='paid' WHERE transID='$transProdID'");
		mysql_query("UPDATE transaction_products set status='paid' WHERE transID='$transProdID'");
	}
	if($transWifiID > 0){
		mysql_query("UPDATE transaction set paymentID='$paymentID',total='$total',status='paid' WHERE transID='$transWifiID'");
		mysql_query("UPDATE transaction_wifi set status='paid' WHERE transID='$transWifiID'");
	}
	header('location:user_thanks.php');
}


if($_GET['mode']=='save_cheque'){
	$fullname=$_GET['fullname'];
	$envelop_no=$_GET['envelop_no'];
	$username=$_GET['username'];
	$cheque_number=$_GET['cheque_number'];
	$cheque_amount=$_GET['cheque_amount'];
	$type=$_GET['type'];

	/** New Updates for product and wifi add ons | October 2022**/
	$transProdID = $_GET['transProdID'];
	$transWifiID = $_GET['transWifiID'];
	$total = $_GET['total'];

	include('dbconnect.php');
	mysql_query("INSERT INTO payment (userID,full_name,envelop_no,amount,transaction,payment_type,cheque_number,date_time,account_number,note,print,view,status)VALUES ('$_SESSION[userID]','$fullname','$envelop_no','$cheque_amount','billing','$type','$cheque_number',NOW(),'$username','','no','no','pending')");
	$paymentID = mysql_insert_id($con);

	/** New Updates for product and wifi add ons | October 2022**/
	if($transProdID > 0){
		mysql_query("UPDATE transaction set paymentID='$paymentID',total='$total',status='paid' WHERE transID='$transProdID'");
		mysql_query("UPDATE transaction_products set status='paid' WHERE transID='$transProdID'");
	}
	if($transWifiID > 0){
		mysql_query("UPDATE transaction set paymentID='$paymentID',total='$total',status='paid' WHERE transID='$transWifiID'");
		mysql_query("UPDATE transaction_wifi set status='paid' WHERE transID='$transWifiID'");
	}
	header('location:user_thanks_cheque.php');

}
?> 