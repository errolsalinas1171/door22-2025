<br />
<form action="insertproduct.php" method="post" enctype="multipart/form-data">
	<center>
		<table border="0" width="90%">
			<tr>
				<td>
					<label>Image</label>
					<input type="file" class='form-control input-md' name="product_img" required value="" /><br>
				</td>
			</tr>
			<tr>
				<td>
					<label>Product Name</label>
					<input type="text" class='form-control input-md' name="product_name" required placeholder="Product Name" value=""><br>
				</td>
			</tr>
			<tr>
				<td>
					<label>Product Code/SKU</label>
					<input type="text" class='form-control input-md' name="product_code" required placeholder="Product Code/SKU" value=""><br>
				</td>
			</tr>
			<tr>
				<td>
					<label>Description</label>
					<input type="text" class='form-control input-md' name="product_description" placeholder="Product Description" value=""><br>
				</td>
			</tr>
			<tr>
				<td>
					<label>Price</label>
					<input type="number" class='form-control input-md' name="product_price" required placeholder="Price" value=""><br>
				</td>
			</tr>
			<tr>
				<td>
					<br><input type="submit" class='btn btn-primary btn-md' value="   ADD PRODUCT   "/>
				</td>
			</tr>
		</table>
	</center>
</form>
<br /><br />
