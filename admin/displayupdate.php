

<center>

        <table border="1" width="60%" class="table table-striped table-bordered table-hover" id="table" bgcolor="#FFFFFF">
            <thead>
                 <tr>
                    <th><center><h5><strong>Transaction #</strong></h5></center></th>
                    <th><center><h5><strong>Name</strong></h5></center></th>
                    <th><center><h5><strong>Type</strong></h5></center></th>
                    <th><center><h5><strong>Envelop #</strong></h5></center></th>
                    <th><center><h5><strong>Cheque #</strong></h5></center></th>
                    <th><center><h5><strong>Date/Time</strong></h5></center></th>
                    <th><center><h5><strong>Amount</strong></h5></center></th>
                    <th><center><h5><strong>Note</strong></h5></center></th>
                    <th><center><h5><strong>Status</strong></h5></center></th>
                    <th><center><h5><strong>Update</strong></h5></center></th>
                </tr>
            </thead>
            <tbody>
<?php
include('dbconnect.php');   
$amount=0;       
$sql=mysql_query("SELECT users.*,payment.* FROM payment 
    INNER JOIN users ON payment.userID=users.userID
    WHERE payment.view='yes' ORDER BY payment.paymentID DESC LIMIT 50");
$OutLine = array('userID'=>'', 'first_name'=>'', 'middle_name'=>'', 'last_name'=>'', 'transaction'=>'', 'payment_type'=>'', 'cheque_number'=>'', 'date_time'=>'', 'amount'=>'');
while($row=mysql_fetch_array($sql))
{
$OutLine['userID'] = $row['userID'];
$OutLine['first_name'] = $row['first_name'];
$OutLine['middle_name'] = $row['middle_name'];
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
                    <td><center><font size="2"><?php echo "".$row['last_name'].", ".$row['first_name']." ".$row['middle_name']."";?></center></font></td>


                    <?php if($row['payment_type']=='cash'){ ?>
                        <td><center><font size="2">Cash</center></font></td>
                    <?php } ?>
                    <?php if($row['payment_type']=='cheque'){ ?>
                        <td><center><font size="2">Cheque</center></font></td>
                    <?php } ?>

                    <td><center><font size="2"><?php echo $row['envelop_no'];?></center></font></td>

                    <?php if($row['cheque_number']!=0){ ?>
                        <td><center><font size="2"><?php echo $row['cheque_number'];?></center></font></td>
                    <?php } ?>
                    <?php if($row['cheque_number']==0){ ?>
                        <td><center><font size="2">----------</center></font></td>
                    <?php } ?>

                    <?php $i=strtotime($row['date_time']); ?>
                    <td><center><font size="2"><?php echo date("M/d/Y h:i A", $i);;?></center></font></td>


                    <?php if($row['status']=='ok'){ ?>
                        <td><center><font size="-6"><?php $amount+=$row['amount']; echo number_format($row['amount'], 2);?></center></font></td>
                        <td><center><font size="-6"><a rel='facebox' href=popup_note_view.php?paymentID=<?php echo $row['paymentID']; ?>><?php echo "".substr($row['note'],0,10).".."; ?></a></center></font></td>
                        <td><center><font size="-6" color='#fff'><div style="background-color:#5cb85c; width:50px; height:15px; border-radius: 5px;">Okay</div></center></font></td>
                        <td><center><font size="-6" color='#fff'><a rel='facebox' href=popup_view.php?paymentID=<?php echo $row['paymentID']; ?>><img src="icon/update.png" width="20px" height="20px" ></a></center></font></td>
                    <?php } ?>

                    <?php if($row['status']=='not_ok'){ ?> 
                        <td><center><font size="-6"><?php echo number_format($row['amount'], 2);?></center></font></td>
                        <td><center><font size="-6"><a rel='facebox' href=popup_note_view.php?paymentID=<?php echo $row['paymentID']; ?>><?php echo "".substr($row['note'],0,10).".."; ?></a></center></font></td>
                        <td><center><font size="-6" color='#fff'><div style="background-color:#484848; width:50px; height:15px; border-radius: 5px;">Not Okay</div></center></font></td>
                        <td><center><font size="-6" color='#fff'><a rel='facebox' href=popup_view.php?paymentID=<?php echo $row['paymentID']; ?>><img src="icon/update.png" width="20px" height="20px" ></a></center></font></td>
                    <?php } ?>

                    <?php if($row['status']=='pending'){ ?>
                        <td><center><font size="-6"><?php echo number_format($row['amount'], 2);?></center></font></td>
                        <td><center><font size="-6">----------</center></font></td>
                        <td><center><font size="-6" color='#fff'><div style="background-color:#ff9c00; width:50px; height:15px; border-radius: 5px;">Pending</div></center></font></td>
                    <?php } ?>

                </tr>
<?php } 
    else
    {
        echo "<tr>";
        echo "<td>Nothing to display yet.</td>";
        echo "</tr>";
    }
                
}?>
           
            </tbody>
        </table>     

    <table>
        <tr>
            <td>
                <h3><strong><br><u>Grand Total</strong></u></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3><?php echo number_format($amount, 2); ?></h3>
            </td>
        </tr>
    </table><br><br>