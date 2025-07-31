<?php 
$date_year=$_POST['date_daily_yy'];
$date_month=$_POST['date_daily_mm'];
$date_day1='01';
$date_day2='31';
$time='00:00:00';


$date_search_1=$date_year."-".$date_month."-".$date_day1;
$date_search_2=$date_year."-".$date_month."-".$date_day2;
?> 

<script>
function myFunction() {
    var myWindow = window.open("reports-monthly-pdf.php?date_year=<?php echo $date_year; ?>&&date_month=<?php echo $date_month; ?>", "", "width=950, height=800");
}
</script>


<div id="othersections">
<div align="right"><button class="btn btn-success" onclick="myFunction()">Print</button></div>
</div>

        <center>
            <h3><strong>Payment Records for <?php $reports_date=strtotime($date_search_1); ?><?php echo "".date("F", $reports_date)."" ?></strong></h3>
        </center><br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th><font size="-6"><center>Trans #</center></font></th>
                    <th><font size="-6"><center>Name</center></font></th>
                    <th><font size="-6"><center>Type</center></font></th>
                    <th><font size="-6"><center>Envelop #</center></font></th>
                    <th><font size="-6"><center>Cheque #</center></font></th>
                    <th><font size="-6"><center>Date/Time</center></font></th>
                    <th><font size="-6"><center>Amount</center></font></th>
                    <th><font size="-6"><center>Note</center></font></th> 
                    <th><font size="-6"><center>Status</center></font></th>
                    <th><font size="-6"><center>View</center></font></th>
                </tr>
            </thead>
            <tbody>
<?php
include('dbconnect.php');
$amount='0';
$sql=mysql_query("SELECT users.*,payment.* FROM payment 
    INNER JOIN users ON payment.userID=users.userID
    WHERE payment.date_time BETWEEN '$date_search_1%' and '$date_search_2%' ORDER BY payment.paymentID DESC");

$OutLine = array('userID'=>'', 'first_name'=>'', 'middle_name'=>'', 'last_name'=>'', 'transaction'=>'', 'payment_type'=>'', 'cheque_number'=>'', 'date_time'=>'', 'amount'=>'');

while($row=mysql_fetch_array($sql))
{
$OutLine['userID'] = $row['userID'];
$OutLine['first_name'] = $row['first_name'];
$OutLine['middle_name'] = $row['middle_name'];
$OutLine['last_name'] = $row['last_name'];
$OutLine['transaction'] = $row['transaction'];
$OutLine['payment_type'] = $row['payment_type'];
$OutLine['cheque_number'] = $row['cheque_number'];
$OutLine['date_time'] = $row['date_time'];
$OutLine['amount'] = $row['amount'];
$countsy='0';
if($row>$countsy)
{
    ?>
                <tr class="gradeX">
                    <td><center><font size="-6"><?php echo "".$row['paymentID']."";?></center></font></td>
                    <td><center><font size="-6"><?php echo "".$row['full_name']."";?></center></font></td>
                    <!--<td><center><font size="-6"><?php echo "".$row['last_name'].", ".$row['first_name']." ".$row['middle_name']."";?></center></font></td>-->


                    <?php if($row['payment_type']=='cash'){ ?>
                        <td><center><font size="-6">Cash</center></font></td>
                    <?php } ?>
                    <?php if($row['payment_type']=='cheque'){ ?>
                        <td><center><font size="-6">Cheque</center></font></td>
                    <?php } ?>

                    <td><center><font size="-6"><?php echo "".$row['envelop_no']."";?></center></font></td>

                    <?php if($row['cheque_number']!=0){ ?>
                        <td><center><font size="-6"><?php echo $row['cheque_number'];?></center></font></td>
                    <?php } ?>
                    <?php if($row['cheque_number']==0){ ?>
                        <td><center><font size="-6">----------</center></font></td>
                    <?php } ?>

                    <?php $i=strtotime($row['date_time']); ?>
                    <td><center><font size="-6"><?php echo date("m/d/Y h:i A", $i);?></center></font></td>

                    <?php if($row['status']=='ok'){ ?>
                        <td><center><font size="-6"><?php $amount+=$row['amount']; echo number_format($row['amount'], 2);?></center></font></td>
                        <td><center><font size="-6">----------</center></font></td>
                        <td><center><font size="-6" color='#fff'><div style="background-color:#5cb85c; width:50px; height:15px; border-radius: 5px;">Okay</div></center></font></td>
                    <?php } ?>

                    <?php if($row['status']=='not_ok'){ ?> 
                        <td><center><font size="-6"><?php echo number_format($row['amount'], 2);?></center></font></td>
                        <td>
                            <center>
                                <font size="-6">
                                    <a rel='facebox' href=popup_note_view.php?paymentID=<?php echo $row['paymentID']; ?>>
                                        <?php echo "".substr($row['note'],0,10).".."; ?>
                                    </a>
                                </center>
                            </font>
                        </td>
                        <td><center><font size="-6" color='#fff'><div style="background-color:#484848; width:50px; height:15px; border-radius: 5px;">Not Okay</div></center></font></td>
                    <?php } ?>

                    <?php if($row['status']=='pending'){ ?>
                        <td><center><font size="-6"><?php echo number_format($row['amount'], 2);?></center></font></td>
                        <td><center><font size="-6">----------</center></font></td>
                        <td><center><font size="-6" color='#fff'><div style="background-color:#ff9c00; width:50px; height:15px; border-radius: 5px;">Pending</div></center></font></td>
                    <?php } ?>
                    <td>
                        <center>
                            <font size="-6">
                                <a rel='facebox' href=popup_note_view.php?paymentID=<?php echo $row['paymentID']; ?>>
                                    <img src="icon/view.png" width="20px" height="20px" >
                                </a>
                            </center>
                        </font>
                    </td>

                </tr>
<?php } 
    else
    {
        echo "<tr>";
        echo "<td>No data available in table</td>";
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
    </table>
<br><br><br>
