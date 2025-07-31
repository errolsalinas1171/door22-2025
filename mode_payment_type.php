<?php 
include('block_user.php');
if($_GET['mode']=='cash'){
	header('location:user_amount.php?type=cash');
}


if($_GET['mode']=='cheque'){
	header('location:user_cheque.php?type=cheque');
}
?>
