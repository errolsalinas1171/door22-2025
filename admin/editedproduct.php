<?php 
include('dbconnect.php');
/** $query1 = mysql_query("SELECT * FROM products WHERE product_code='$_POST[product_code]'");
if(mysql_num_rows($query1) != 0)
		{
		echo "<script language='Javascript'>
			alert('Product Code/SKU already exist!');
			location.href='admin_products_edit.php?productID=$_POST[productID]';
			</script>";
			die . mysql_error();
		} **/

if(isset($_POST['edit']))
{

	if(!$_POST['product_name'])
  		{
  			echo "<script language='Javascript'>
			alert('Please enter Product Name!');
			location.href='admin_products_edit.php?productID=$_POST[productID]';
			</script>";
			die . mysql_error();
  		}

	if(!$_POST['product_code'])
  		{
  			echo "<script language='Javascript'>
			alert('Please enter Product Code!');
			location.href='admin_products_edit.php?productID=$_POST[productID]';
			</script>";
			die . mysql_error();
  		}


mysql_query("UPDATE products set product_name='$_POST[product_name]',product_code='$_POST[product_code]',product_description='$_POST[product_description]',product_price='$_POST[product_price]' WHERE productID='$_POST[productID]'");
	echo "<script language='Javascript'>
			alert('Product successfully updated. ');
			location.href='admin_products.php';
			</script>";
			die . mysql_error();
}

?>