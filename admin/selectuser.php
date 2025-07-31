<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th><center><h5><strong>Client's #</strong></h5></center></th>
                    <th><center><h5><strong>Name</strong></h5></center></th>
                    <th><center><h5><strong>Contact #</strong></h5></center></th>
                    <th><center><h5><strong>Email</strong></h5></center></th>
                    <th><center><h5><strong>Address</strong></h5></center></th>
                    <th><center><h5><strong>Date Added</strong></h5></center></th>
                    <th><center><h5><strong>Date Updated</strong></h5></center></th>
                    <th><center><h5><strong>Account #</strong></h5></center></th>
                    <th><center><h5><strong>PIN #</strong></h5></center></th>
                    <th><center><h5><strong>Select</strong></h5></center></th>
                </tr>
            </thead>
            <tbody>
<?php
include('dbconnect.php');          
$sql=mysql_query("SELECT * from users WHERE user_type='user' ORDER BY userID DESC");
$OutLine = array('userID'=>'', 'first_name'=>'', 'middle_name'=>'', 'last_name'=>'', 'contact_number'=>'', 'email'=>'', 'address'=>'', 'date_added'=>'', 'date_updated'=>'', 'username'=>'', 'password'=>'');
while($row=mysql_fetch_array($sql))
{
$OutLine['userID'] = $row['userID'];
$OutLine['first_name'] = $row['first_name'];
$OutLine['middle_name'] = $row['middle_name'];
$OutLine['contact_number'] = $row['contact_number'];
$OutLine['email'] = $row['email'];
$OutLine['address'] = $row['address'];
$OutLine['date_added'] = $row['date_added'];
$OutLine['date_updated'] = $row['date_updated'];
$OutLine['username'] = $row['username'];
$OutLine['password'] = $row['password'];
$countsy=0;
if($row>$countsy)
{
    ?>
                 <tr>
                    <td><center><font size="2"><?php echo $row['userID'];?></center></font></td>
                    <td><center><font size="2"><?php echo "".$row['last_name'].", ".$row['first_name']." ".$row['middle_name']."";?></center></font></td>
                    <td><center><font size="2"><?php echo $row['contact_number'];?></center></font></td>
                    <td><center><font size="2"><?php echo $row['email'];?></center></font></td>
                    <td><center><font size="2"><?php echo $row['address'];?></center></font></td>
                    <?php $i=strtotime($row['date_added']); ?>
                    <td><center><font size="2"><?php echo date("M/d/Y h:i A", $i);?></center></font></td>
                    <?php if($row['date_updated']=='0000-00-00 00:00:00'){?>
                        <td><center><font size="2">Never</center></font></td>
                    <?php } ?>
                    <?php if($row['date_updated']!='0000-00-00 00:00:00'){?>
                        <?php $i=strtotime($row['date_updated']); ?>
                        <td><center><font size="2"><?php echo date("M/d/Y h:i A", $i);;?></center></font></td>
                    <?php } ?>
                    <td><center><font size="2"><?php echo $row['username'];?></center></font></td>
                    <td><center><font size="2"><?php echo $row['password'];?></center></font></td>
                    <td><center><font size="2"><a href="admin_reports_client_view.php?userID=<?php echo $row['userID']; ?>"><img src="icon/ok.png" title='Select Client' width="20px" height="20px" ></span></span></a></font></center></td>
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
