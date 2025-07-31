<?php

require_once(dirname(__FILE__) . "/escpos.php");
$connector = new NetworkPrintConnector("192.168.254.50", 9100);
$printer = new Escpos($connector);
$printer -> setJustification(Escpos::JUSTIFY_CENTER);
$printer -> text("Test Print! ");

$printer -> cut();
$printer -> pulse();
$printer -> close();


?>
