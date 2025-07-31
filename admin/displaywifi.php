<br><br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th><font size="-6"><center>Wifi Voucher</center></font></th>
                    <th><font size="-6"><center>Voucher Code</center></font></th>
                    <th><font size="-6"><center>Voucher Days</center></font></th>
                    <th><font size="-6"><center>Price</center></font></th>
                    <th><font size="-6"><center>Date Added</center></font></th>
                    <th><font size="-6"><center>Availability</center></font></th>
                    <th><font size="-6"><center>Status</center></font></th>
                </tr>
                </tr>
            </thead>
            <tbody>
<?php
include('dbconnect.php');
$amount='0';
$sql=mysql_query("SELECT * FROM wifi_vouchers ORDER BY voucherID DESC");

$OutLine = array('wifi_voucher'=>'', 'wifi_voucher_code'=>'', 'wifi_voucher_days'=>'', 'wifi_price'=>'', 'date_added'=>'');

while($row=mysql_fetch_array($sql))
{
$OutLine['wifi_voucher'] = $row['wifi_voucher'];
$OutLine['wifi_voucher_code'] = $row['wifi_voucher_code'];
$OutLine['wifi_voucher_days'] = $row['wifi_voucher_days'];
$OutLine['wifi_price'] = $row['wifi_price'];
$OutLine['date_added'] = $row['date_added'];
$countsy=0;
if($row>$countsy)
{
    ?>
                <tr class="gradeX">
                    <td><center><font size="-6"><?php echo "".$row['wifi_voucher']."";?></center></font></td>
                    <td><center><font size="-6"><?php echo "".$row['wifi_voucher_code']."";?></center></font></td>
                    <td><center><font size="-6"><?php echo "".$row['wifi_voucher_days']." Days";?></center></font></td>
                    <td><center><font size="-6"><?php echo "Php. ".number_format($row['wifi_price'],2)."";?></center></font></td>

                    <?php $i=strtotime($row['date_added']); ?>
                    <td><center><font size="-6"><?php echo date("m/d/Y h:i A", $i);;?></center></font></td>
                    
                    <?php if($row['is_added'] == 1){ ?>
                        <td><center><font size="-6">Used</font></center></td>
                    <?php }else { ?>
                        <td><center><font size="-6">Available</font></center></td>
                    <?php } ?>
                    
                    <?php if($row['voucher_status']=='enabled'){ ?>
                        <td><center><a href="mode_edit_user.php?mode=wifi_enable&&voucherID=<?php echo $row['voucherID']; ?>"><img src="icon/ok_green.png" title='This Wifi Voucher is Enabled' width="18px" height="18px" ></a></center></td>
                    <?php } ?>

                    <?php if($row['voucher_status']=='disabled'){ ?>
                        <td><center><a href="mode_edit_user.php?mode=wifi_disable&&voucherID=<?php echo $row['voucherID']; ?>"><img src="icon/disabled.png" title='This Wifi Voucher is Disabled' width="15px" height="15px" ></a></center></td>
                    <?php } ?>

                    <?php if($row['voucher_status']=='used'){ ?>
                        <td><center><img src="icon/disabled-gray.png" title='This Wifi Voucher is already used' width="15px" height="15px" ></center></td>
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
