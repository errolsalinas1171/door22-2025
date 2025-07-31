
<div style="margin:5; padding:20px;">
<br>
<?php
include('dbconnect.php');	
$paymentID=$_GET['paymentID'];	   
$sql=mysql_query("SELECT * FROM payment WHERE paymentID='$paymentID'");
while($row=mysql_fetch_array($sql))
{
?>
<font size="6">Payment Details</font><br><br>

<form action="mode_today.php?mode=edit_not_okay&&paymentID=<?php echo $paymentID; ?>" method="post">
	<table border="0" width="100%">
		<tr>
			<td>
				<font size="3">
					Account Number
				</font>
			</td>
			<td>
				<font size="3"> : </font>
			</td>
			<td width="60%">
				<font size="3">
					<?php echo $row['userID'];?>
				</font>
			</td>
		</tr>
		<tr>
			<td>
				<font size="3">Name</font>
			</td>
			<td>
				<font size="3"> : </font>
			</td>
			<td width="60%">
				<font size="3"><?php echo "".$row['full_name']."";?></font>
			</td>
		</tr>
		<tr>
			<td>
				<font size="3">Payment Type</font>
			</td>
			<td>
				<font size="3"> : </font>
			</td>
			<td>
				<font size="3">
					<?php if($row['payment_type']=='cash'){ ?>
                        Cash
                    <?php } ?>
                    <?php if($row['payment_type']=='cheque'){ ?>
                        Cheque
                    <?php } ?>
	            </font>
	        </td>
		</tr>
		<tr>
			<td>
				<font size="3">Date/Time</font>
			</td>
			<td>
				<font size="3"> : </font>
			</td>
			<td width="60%">
				<font size="3">
					<?php $i=strtotime($row['date_time']); ?><?php echo date("M/d/Y h:i A", $i);;?>
				</font>
			</td>
		</tr>
		<tr>
			<td>
				<font size="3">Account Number</font>
			</td>
			<td>
				<font size="3"> : </font>
			</td>
			<td width="60%">
				<font size="3">
					<?php echo number_format($row['amount'], 2);?>
				</font>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<?php
          	/** Get User and Room details **/
   			$userID = $row['userID'];
  			$roomID=mysql_query("SELECT * FROM rooms WHERE userID='$userID'");
  			$room_display=mysql_fetch_array($roomID);
  			$roomPrice = $room_display['room_price'];

			/** Check if there is an existing PRODUCT transaction on the Transaction table **/
			$transactionProd = mysql_query("SELECT * FROM transaction WHERE paymentID='$paymentID' AND type='product'");
		    $transactionProdCount = mysql_num_rows($transactionProd);
		    $transactionProdDetails = mysql_fetch_array($transactionProd);
		    $transProdID = $transactionProdDetails['transID'];

			/** Check if there is an existing WIFI VOUCHER transaction on the Transaction table **/
			$transactionWifi = mysql_query("SELECT * FROM transaction WHERE paymentID='$paymentID' AND type='wifi'");
		    $transactionWifiCount = mysql_num_rows($transactionWifi);
		    $transactionWifiDetails = mysql_fetch_array($transactionWifi);
		    $transWifiID = $transactionWifiDetails['transID'];

			/** Get Product's total transaction price **/
			$prodGrandTotal = 0;
			$sqlprod = mysql_query("SELECT * FROM transaction_products WHERE transID='$transProdID'");
			while($row=mysql_fetch_array($sqlprod))
			{
				$prodTotal = $row['product_price'] * $row['product_qty'];
				$prodGrandTotal+=$prodTotal;
			}

	      	/** Get Wifi's total transaction price **/
			$wifiGrandTotal = 0;
			$sqlwifi = mysql_query("SELECT * FROM transaction_wifi WHERE transID='$transWifiID'");
			while($row=mysql_fetch_array($sqlwifi))
			{
				$wifiTotal = $row['wifi_price'] * $row['wifi_qty'];
				$wifiGrandTotal+=$wifiTotal;				
			}
		?>
		<?php if($transProdID > 0 || $transWifiID > 0){ ?>
			<tr>
				<td>
					<font size="3">Total</font>
				</td>
				<td>
					<font size="3"> : </font>
				</td>
				<td width="60%">
					<font size="3">
						<?php echo number_format($roomPrice + $prodGrandTotal + $wifiGrandTotal, 2);?>
					</font>
				</td>
			</tr>
		<?php } ?>
		<?php if($transProdID > 0 || $transWifiID > 0){ ?>
			<tr>
				<td>
					<font size="3">Room Price</font>
				</td>
				<td>
					<font size="3"> : </font>
				</td>
				<td width="60%">
					<font size="3">
						<?php echo number_format($roomPrice, 2);?>
					</font>
				</td>
			</tr>
		<?php } ?>
		<?php if($transProdID > 0 || $transWifiID > 0){ ?>
			<tr>
				<td>
					<font size="3">Add-ons Total</font>
				</td>
				<td>
					<font size="3"> : </font>
				</td>
				<td width="60%">
					<font size="3">
						<?php echo number_format($prodGrandTotal + $wifiGrandTotal, 2);?>
					</font>
				</td>
			</tr>
			<tr>
				<td>
					<font size="2">
						<?php 
							$sqlprod = mysql_query("SELECT * FROM transaction_products WHERE transID='$transProdID'");
							while($row=mysql_fetch_array($sqlprod))
							{
								$totalPrice = $row['product_price'] * $row['product_qty'];
								echo "* ".$row['product_name']." x ".$row['product_qty']."pcs (".number_format($totalPrice,2).")<br>";		
							}
						?>
						<?php 
							$sqlwifi = mysql_query("SELECT * FROM transaction_wifi WHERE transID='$transWifiID'");
							while($row=mysql_fetch_array($sqlwifi))
							{
								$totalWifiPrice = $row['wifi_price'] * $row['wifi_qty'];
								echo "* ".$row['wifi_voucher']." x ".$row['wifi_qty']."pcs (".number_format($totalWifiPrice,2).")<br>";		
							}
						?>
					</font>
				</td>
				<td>
					<font size="2">
					</font>
				</td>
				<td width="60%">
					<font size="3">

					</font>
				</td>
			</tr>
		<?php } ?>
		<tr>
			<td>
				<font size="3">Note</font>
			</td>
			<td>
				<font size="3"> : </font>
			</td>
			<td width="60%">
				<font size="3"><?php echo "".$row['note']."";?></font>
			</td>
		</tr>
	</table>
</form>
	<br><br>
    	<center></center>
</div>
<?php } ?>