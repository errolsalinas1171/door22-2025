<?php
include('block_user.php');
$type=$_GET['type'];
$query1 = mysql_query("SELECT * FROM payment WHERE envelop_no='$_POST[envelop_no]'");
if(mysql_num_rows($query1) != 0)
		{
		echo "<script language='Javascript'>
			alert('Envelope number already exist!');
			location.href='user_amount.php?type=".$_GET['type']."';
			</script>";
			die . mysql_error();
		}
if(!$_POST['envelop_no'])
  		{
  			echo "<script language='Javascript'>
			alert('Please enter Envelope Number');
			location.href='user_amount.php?type=".$_GET['type']."';
			</script>";
			die . mysql_error();
  		}
if(!$_POST['amount'])
  		{
  			echo "<script language='Javascript'>
			alert('Please enter Amount');
			location.href='user_amount.php?type=".$_GET['type']."';
			</script>";
			die . mysql_error();
  		}

if($_GET['mode']=='amount'){
	$type=$_GET['type'];
	header('location:user_view_details.php?type='.$type.'&&amount='.$_POST['amount'].'&&envelop_no='.$_POST['envelop_no'].'');
}



if($_GET['mode']=='cheque_number'){
	echo $_POST['cheque'];

	header('location:user_cheque_amount.php?type='.$_GET['type'].'&&cheque_number='.$_POST['cheque_number'].'');
}

?>
