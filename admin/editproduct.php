<?php 
echo "<form action='editedproduct.php' method='post'>";
include('dbconnect.php');
$productID=$_GET['productID'];
$result = mysql_query("SELECT * FROM products WHERE productID='$productID'");
while($row = mysql_fetch_array($result))
  
{

echo "
<input type='hidden' name='productID' value=".$row['productID'].">
<center>
  <table border='0' width='90%'>
    <tr>
      <td>
        <label>Product Name</label>
        <input type='text' class='form-control input-md' name='product_name' value='".$row['product_name']."'><br>
      </td>
    </tr>
    <tr>
      <td>
        <label>Product Code/SKU</label>
        <input type='text' class='form-control input-md' name='product_code' value='".$row['product_code']."'><br>
      </td>
    </tr>
    <tr>
      <td>
        <label>Product Description</label>
        <input type='text' class='form-control input-md' name='product_description' value='".$row['product_description']."'><br>
      </td>
    </tr>
    <tr>
      <td>
        <label>Price</label>
        <input type='text' class='form-control input-md' name='product_price' value='".$row['product_price']."'><br>
      </td>
    </tr>
    <tr>
      <td><br><input type='submit' class='btn btn-primary btn-md' name='edit' value='UPDATE PRODUCT'/></td>
    </tr>
  </table>
</center>
  ";


 } 
 echo "</form>";
 mysql_close($con); 
 ?>
 <br><br>