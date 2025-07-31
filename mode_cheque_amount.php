<?php
include('block_user.php');
//$transaction=$_GET['transaction'];
$type=$_GET['type'];
$type=$_GET['cheque_number'];

if(!$_POST['cheque_amount'])
  		{
  			echo "<script language='Javascript'>
			alert('Please enter Amount');
			location.href='user_cheque_amount.php?cheque_number=".$_GET['cheque_number']."&&type=".$_GET['type']."&&envelop_no=".$_GET['envelop_no']."';
			</script>";
			die . mysql_error();
  		}

  		
if($_GET['mode']=='cheque_amount'){
	echo $_POST['cheque_amount'];

	header('location:user_view_cheque_details.php?type='.$_GET['type'].'&&cheque_number='.$_GET['cheque_number'].'&&envelop_no='.$_GET['envelop_no'].'&&cheque_amount='.$_POST['cheque_amount'].'');
}
?>
