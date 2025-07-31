<?php 
include('block_user.php');
if($_GET['mode']=='room'){

	header('location:user_payment_type.php?transaction=room_rental');
}


if($_GET['mode']=='electric'){

	header('location:user_payment_type.php?transaction=electric_bill');
}


if($_GET['mode']=='water'){

	header('location:user_payment_type.php?transaction=water_bill');
}
?>
