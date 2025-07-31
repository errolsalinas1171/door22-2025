
<div style="margin:5; padding:20px;">
<br>
<?php
include('dbconnect.php');	
$ID=$_GET['userID'];	   
$sql=mysql_query("SELECT * FROM users WHERE userID='$ID'");
while($row=mysql_fetch_array($sql))
{
?>
<font size="6">Client's Details</font><br><br>

	<table border="0" width="100%">
		<tr>
			<td><font size="3">Name</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo "".$row['last_name'].", ".$row['first_name']." ".$row['middle_name']."";?></font></td>
		</tr>
		<tr>
			<td><font size="3">Company</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo $row['company_name'];?></font></td>
		</tr>
		<tr>
			<td><font size="3">Contact Number</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo $row['contact_number'];?></font></td>
		</tr>
		<tr>
			<td><font size="3">Email</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo $row['email'];?></font></td>
		</tr>
		<tr>
			<td><font size="3">Address</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo $row['address'];?></font></td>
		</tr>
		<tr>
			<td><font size="3">Account #</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo $row['username'];?></font></td>
		</tr>
		<tr>
			<td><font size="3">PIN #</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo $row['password'];?></font></td>
		</tr>
		<tr>
			<td><font size="3">Date Added</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php $i=strtotime($row['date_added']); ?><?php echo date("M/d/Y h:i A", $i);;?></font></td>
		</tr>
		<tr>
			<?php if($row['date_updated']=='0000-00-00 00:00:00'){?>
                <td><font size="3">Date Updated</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3">Never</font></td>
            <?php } ?>
            <?php if($row['date_updated']!='0000-00-00 00:00:00'){?>
            <?php $i=strtotime($row['date_updated']); ?>
                 <td><font size="3">Date Updated</font></td><td><font size="3"> : </font></td><td width="60%"><font size="3"><?php echo date("M/d/Y h:i A", $i);?></font></td>
            <?php } ?>
		</tr>
	</table>
	<br><br>
    	<center></center>
</div>
<?php } ?>