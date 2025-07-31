<?php
include('dbconnect.php'); 

$header=mysql_query("SELECT * FROM receipt_header WHERE receipt_headerID='1'");
$header_display=mysql_fetch_array($header);

$footer=mysql_query("SELECT * FROM receipt_footer WHERE receipt_footerID='1'");
$footer_display=mysql_fetch_array($footer);


$sql=mysql_query("SELECT * FROM transaction_wifi WHERE print='no'");
while($row=mysql_fetch_array($sql))
{

/* Define all values from the transaction table */ 
$voucherTransID = "000".$row['trans_voucherID'];
$date_created = strtotime($row['date_created']);
$voucherCode = $row['wifi_voucher_code'];
$voucherPrice = $row['wifi_price'];

/** SET voucher days value **/
$voucherDays = $row['wifi_voucher_days'];
if($voucherDays == 7){
    $wifiVoucherDays = $voucherDays." Days";
}if($voucherDays == 15){
    $wifiVoucherDays = $voucherDays." Days";
}if($voucherDays == 30){
    $wifiVoucherDays = $voucherDays." Days";
}

/** GET User Details **/
$userID = $row['userID'];

/** Get Room Details **/
$room = mysql_query("SELECT * FROM rooms WHERE userID='$userID'");
$roomDetails = mysql_fetch_array($room);
$roomNo = $roomDetails['room_no'];

require_once(dirname(__FILE__) . "/escpos.php");
$connector = new NetworkPrintConnector("192.168.254.50", 9100);
$printer = new Escpos($connector);
$printer -> setJustification(Escpos::JUSTIFY_CENTER);
$printer -> text("".$header_display['header1']."\n");
$printer -> text("".$header_display['header2']."\n");
$printer -> text("".$header_display['header3']."\n");
$printer -> text("".$header_display['header4']."\n");
$printer -> text("----------------------------------------\n");
$printer -> text("".date("M/d/Y h:i A", $date_created)." - Original\n\n");

$printer -> setJustification(Escpos::JUSTIFY_LEFT);
$printer -> text("Transaction # : ".$voucherTransID."\n");
$printer -> text("Room # : ".$roomNo."\n");
$printer -> text("Voucher Code : ".$voucherCode."\n");
$printer -> text("Valid for : ".$wifiVoucherDays."\n");
$printer -> text("Price : ".number_format($voucherPrice,2)."\n\n");

$printer -> setJustification(Escpos::JUSTIFY_CENTER);
$printer -> text("---------------------------------------\n\n");
$printer -> text("".$footer_display['footer1']."\n");
$printer -> text("".$footer_display['footer2']."\n");
$printer -> text("".$footer_display['footer3']."\n");
$printer -> text("".$footer_display['footer4']."\n");

$printer -> cut();
$printer -> pulse();
$printer -> close();

}
?>



