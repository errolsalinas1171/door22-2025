<?php
include('dbconnect.php'); 

$header=mysql_query("SELECT * FROM receipt_header WHERE receipt_headerID='1'");
$header_display=mysql_fetch_array($header);

$footer=mysql_query("SELECT * FROM receipt_footer WHERE receipt_footerID='1'");
$footer_display=mysql_fetch_array($footer);


$sql=mysql_query("SELECT users.*,payment.* FROM payment 
    INNER JOIN users ON payment.userID=users.userID
    WHERE payment.print='no'");
while($row=mysql_fetch_array($sql))
{
$date_time=strtotime($row['date_time']);

if($row['payment_type']=='cheque'){
	$payment_type='Cheque';
}

require_once(dirname(__FILE__) . "/escpos.php");
$connector = new NetworkPrintConnector("192.168.254.50", 9100);
$printer = new Escpos($connector);
$printer -> setJustification(Escpos::JUSTIFY_CENTER);
$printer -> text("".$header_display['header1']."\n");
$printer -> text("".$header_display['header2']."\n");
$printer -> text("".$header_display['header3']."\n");
$printer -> text("".$header_display['header4']."\n");
$printer -> text("----------------------------------------\n");
$printer -> text("".date("M/d/Y h:i A", $date_time)." - Original\n\n");

$printer -> setJustification(Escpos::JUSTIFY_LEFT);
$printer -> text("Transaction # : ".$row['paymentID']."\n");
$printer -> text("Envelop # : ".$row['envelop_no']."\n");
$printer -> text("Name : ".$row['last_name'].", ".$row['first_name']."\n");
$printer -> text("Payment Type : ".$payment_type."\n");
$printer -> text("Cheque Number : ".$row['cheque_number']."\n");
$printer -> text("Cash payment : ".number_format($row['amount'],2)."\n");

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
