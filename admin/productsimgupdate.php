<br />
<form action="productsimgupdated.php" method="post" enctype="multipart/form-data">
	<center>
		<table border="0" width="90%">
			<tr>
				<td>
					<input type="hidden" name="productID" value="<?php echo $_GET['productID']; ?>">
					<label>Update Product Image</label>
					<input type="file" class='form-control input-md' name="product_img" required value="" /><br>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" class='btn btn-primary btn-md' name="edit" value=" Update "/>
				</td>
			</tr>
		</table>
	</center>
	  
</form>
<br/><br/>

