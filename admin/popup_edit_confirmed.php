

<div style="margin:5; padding:20px;">
<br>
<?php
include('dbconnect.php');	
$ID=$_GET['paymentID'];	   
$sql=mysql_query("SELECT users.*,payment.* FROM payment 
    INNER JOIN users ON payment.userID=users.userID
    WHERE payment.paymentID='$ID'");
while($row=mysql_fetch_array($sql))
{
?>
<font size="6">Payment Details</font><br><br>

<form action="mode_today.php?mode=confirmed_not_okay&&paymentID=<?php echo $ID; ?>" method="post">
	<table border="0" width="100%">
		<tr>
			<td><font size="3">Account Number</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo $row['userID'];?></font></td>
		</tr>
		<tr>
			<td><font size="3">Name</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo "".$row['last_name'].", ".$row['first_name']." ".$row['middle_name']."";?></font></td>
		</tr>
		<tr>
			<td><font size="3">Transaction</font></td>
			<td><font size="3"> : </font></td>
			<td><font size="3">
				<?php if($row['transaction']=='room_rental'){ ?>
                        Room Rental
                    <?php } ?>
                    <?php if($row['transaction']=='electric_bill'){ ?>
                        Electric Bill
                    <?php } ?>
                    <?php if($row['transaction']=='water_bill'){ ?>
                        Water Bill
                <?php } ?>
            </font></td>
		</tr>
		<tr>
			<td><font size="3">Payment Type</font></td>
			<td><font size="3"> : </font></td>
			<td><font size="3">
				<?php if($row['payment_type']=='cash'){ ?>
                        Cash
                    <?php } ?>
                    <?php if($row['payment_type']=='cheque'){ ?>
                        Cheque
                    <?php } ?>
            </font></td>
		</tr>
		<tr>
			<td><font size="3">Date/Time</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php $i=strtotime($row['date_time']); ?><?php echo date("M/d/Y h:i A", $i);;?></font></td>
		</tr>
		<tr>
			<td><font size="3">Account Number</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo number_format($row['amount'], 2);?></font></td>
		</tr>
		<tr>
			<td><font size="3">Note</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><textarea name='note' cols='30' rows='3'><?php echo $row['note'];?></textarea></font></td>
		</tr>
		<tr>
			<td align="right"><br><br><a href="mode_today.php?mode=okay&&paymentID=<?php echo $row['paymentID']; ?>" class="btn btn-primary">   Okay   </a></td><td><br><br></td><td width="60%" align="center"><br><br><input type="submit" class="btn btn-primary" value="Not Okay"></td>
		</tr>
	</table>
</form>
	<br><br>
    	<center></center>
</div>
<?php } ?>