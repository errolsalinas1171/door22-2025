
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th><center><h6><strong>Trans #</strong></h6></center></th>
                    <th><center><h6><strong>Name</strong></h6></center></th>
                    <th><center><h6><strong>Type</strong></h6></center></th>
                    <th><center><h6><strong>Envelop #</strong></h6></center></th>
                    <th><center><h6><strong>Cheque #</strong></h6></center></th>
                    <th><center><h6><strong>Date/Time</strong></h6></center></th>
                    <th><center><h6><strong>Amount</strong></h6></center></th>
                    <th><center><h6><strong>View</strong></h6></center></th>
                    <th><center><h6><strong>Delete</strong></h6></center></th>
                </tr>
            </thead>
         
            <tbody>
            
<?php
include('dbconnect.php');		   
$sql=mysql_query("SELECT * FROM payment WHERE view='no'");
    $OutLine = array('userID'=>'', 'full_name'=>'', 'transaction'=>'', 'payment_type'=>'', 'cheque_number'=>'', 'date_time'=>'', 'amount'=>'');
    while($row=mysql_fetch_array($sql))
    {
    $OutLine['userID'] = $row['userID'];
    $OutLine['full_name'] = $row['full_name'];
    $OutLine['transaction'] = $row['transaction'];
    $OutLine['payment_type'] = $row['payment_type'];
    $OutLine['cheque_number'] = $row['cheque_number'];
    $OutLine['date_time'] = $row['date_time'];
    $OutLine['amount'] = $row['amount'];
    $countsy=0;
    if($row>$countsy)
    {
    	?>
                <tr>
                    <td><center><font size="2"><?php echo $row['paymentID'];?></center></font></td>
                    <td><center><font size="-6"><?php echo "".$row['full_name']."";?></center></font></td>
                    <!--<td><center><font size="-6"><?php echo "".$row['last_name'].", ".$row['first_name']." ".$row['middle_name']."";?></center></font></td>-->


                    <?php if($row['payment_type']=='cash'){ ?>
                        <td><center><font size="2">Cash</center></font></td>
                    <?php } ?>
                    <?php if($row['payment_type']=='cheque'){ ?>
                        <td><center><font size="2">Cheque</center></font></td>
                    <?php } ?>

                    <td><center><font size="-6"><?php echo "".$row['envelop_no']."";?></center></font></td>

                    <?php if($row['cheque_number']!=0){ ?>
                        <td><center><font size="2"><?php echo $row['cheque_number'];?></center></font></td>
                    <?php } ?>
                    <?php if($row['cheque_number']==0){ ?>
                        <td><center><font size="2">----------</center></font></td>
                    <?php } ?>

                    <?php $i=strtotime($row['date_time']); ?>
                    <td><center><font size="2"><?php echo date("M/d/Y h:i A", $i);;?></center></font></td>

                    <td><center><font size="2"><?php echo number_format($row['amount'], 2);?></center></font></td>

                    <td><center><font size="2"><a rel='facebox' href=popup_view.php?paymentID=<?php echo $row['paymentID']; ?>><img src="icon/view.png" width="20px" height="20px" ></span></span></a></font></center></td>
                    
                     <td><center><font size="2"><a href="roomhistory.php?mode=delete_record_data&&paymentID=<?php echo $row['paymentID']; ?>">Delete</span></span></a></font></center></td>
                </tr>
    <?php } 

    	else {
            echo "<tr>";
            echo "<td>Nothing to display yet.</td>";
            echo "</tr>";
        }
				
    }?>
           
    </tbody>
</table>

        