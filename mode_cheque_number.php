<?php
include('block_user.php');
$type=$_GET['type'];

if(!$_POST['envelop_no'])
  		{
  			echo "<script language='Javascript'>
			alert('Please enter Envelop Number');
			location.href='user_cheque.php?type=".$_GET['type']."';
			</script>";
			die . mysql_error();
  		}

if(!$_POST['cheque_number'])
  		{
  			echo "<script language='Javascript'>
			alert('Please enter Cheque Number');
			location.href='user_cheque.php?type=".$_GET['type']."';
			</script>";
			die . mysql_error();
  		}


if($_GET['mode']=='cheque_number'){
	echo $_POST['cheque'];

	header('location:user_cheque_amount.php?type='.$_GET['type'].'&&cheque_number='.$_POST['cheque_number'].'&&envelop_no='.$_POST['envelop_no'].'');
}

?> 
