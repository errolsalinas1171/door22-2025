<?php

if($_GET['mode']=='cash_print'){
include("print.php");

	header('location:logout.php');
}


if($_GET['mode']=='cheque_print'){
include("print_cheque.php");

	header('location:logout.php');
}

?>