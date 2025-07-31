<?php
include('dbconnect.php');
if($_GET['mode']=='delete')
{
echo "<script language='Javascript'>
			var con=confirm('Are you sure you want to delete this Record?');
			if(con)
			{ 
			location.href='deleteroomhistory.php?historyID=".$_GET['historyID']."';
			}
			else
			{
				location.href='admin_room_history.php';
			}
			</script>";
}


if($_GET['mode']=='delete_room')
{
echo "<script language='Javascript'>
			var con=confirm('Are you sure you want to delete this Room?');
			if(con)
			{ 
			location.href='deleteroom.php?roomID=".$_GET['roomID']."';
			}
			else
			{
				location.href='admin_room.php';
			}
			</script>";
}


if($_GET['mode']=='delete_product')
{
echo "<script language='Javascript'>
			var con=confirm('Are you sure you want to delete this Product?');
			if(con)
			{ 
			location.href='deleteproduct.php?productID=".$_GET['productID']."';
			}
			else
			{
				location.href='admin_products_add.php';
			}
			</script>";
}

if($_GET['mode']=='delete_client')
{
echo "<script language='Javascript'>
			var con=confirm('Are you sure you want to delete this Client?');
			if(con)
			{ 
			location.href='deleteclient.php?userID=".$_GET['userID']."';
			}
			else
			{
				location.href='admin_user_display.php';
			}
			</script>";
}

if($_GET['mode']=='delete_record_data')
{
echo "<script language='Javascript'>
			var con=confirm('Are you sure you want to delete this Record?');
			if(con)
			{ 
			location.href='deleterecords.php?paymentID=".$_GET['paymentID']."';
			}
			else
			{
				location.href='admin_index.php';
			}
			</script>";
}
?>