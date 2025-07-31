<br><br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th><font size="-6"><center>Room #</center></font></th>
                    <th><font size="-6"><center>Price</center></font></th>
                    <th><font size="-6"><center>Description</center></font></th>
                    <th><font size="-6"><center>Date Added</center></font></th>
                    <th><font size="-6"><center>Client</center></font></th>
                    <th><font size="-6"><center>Update</center></font></th>
                    <th><font size="-6"><center>Status</center></font></th>
                    <th><font size="-6"><center>Assign</center></font></th>
                    <th><font size="-6"><center>Empty</center></font></th>
                    <th><font size="-6"><center>Delete</center></font></th>
                </tr>
                </tr>
            </thead>
            <tbody>
<?php
include('dbconnect.php');
$amount='0';
$sql=mysql_query("SELECT * FROM rooms ORDER BY room_no DESC");

$OutLine = array('room_no'=>'', 'room_price'=>'', 'description'=>'', 'date_added'=>'', 'status'=>'');

while($row=mysql_fetch_array($sql))
{
$OutLine['room_no'] = $row['room_no'];
$OutLine['room_price'] = $row['room_price'];
$OutLine['description'] = $row['description'];
$OutLine['date_added'] = $row['date_added'];
$OutLine['status'] = $row['status'];
$countsy=0;
if($row>$countsy)
{
    ?>
                <tr class="gradeX">
                    <td><center><font size="-6"><?php echo "".$row['room_no']."";?></center></font></td>
                    <td><center><font size="-6"><?php echo "Php. ".number_format($row['room_price'],2)."";?></center></font></td>
                    <td><center><font size="-6"><?php echo "".$row['description']."";?></center></font></td>

                    <?php $i=strtotime($row['date_added']); ?>
                    <td><center><font size="-6"><?php echo date("m/d/Y h:i A", $i);;?></center></font></td>
                    
                    <?php if($row['userID']==0){ ?>
                    <td><center><font size="-6">----------</center></font></td>
                    <?php } ?>

                    <?php if($row['userID']!=0){ ?>
                    <td><center><font size="-6">
                    <?php
                    include('dbconnect.php');
                    $client=mysql_query("SELECT * FROM users WHERE userID=".$row['userID']."");
                    $client_display=mysql_fetch_array($client);

                        echo "".$client_display['last_name'].", ".$client_display['first_name']." ".$client_display['middle_name']."";
                    ?>
                    </center></font></td>
                    <?php } ?>

                    <td><center><font size="2"><a href="mode_edit_user.php?mode=edit_room&&roomID=<?php echo $row['roomID']; ?>"><img src="icon/update.png" title='Update Details' width="20px" height="20px" ></a></font></center></td>
                    
                    <?php if($row['status']=='available'){ ?>
                    <td><center><font size="-6"><img src="icon/ok_green.png" title='This Room is Available' width="18px" height="18px" ></a></center></font></td>
                    <?php } ?>

                    <?php if($row['status']=='occupied'){ ?>
                    <td><center><font size="-6"><img src="icon/disabled.png" title='This Room is Occupied' width="15px" height="15px" ></a></center></font></td>
                    <?php } ?>

                    <td><center><font size="2"><a rel='facebox' href=roomselectuser.php?roomID=<?php echo $row['roomID']; ?>&&historyID=<?php echo $row['historyID']; ?>><img src="icon/ok.png" title='Assign Client' width="20px" height="20px" ></a></font></center></td>
                
                    <?php if($row['userID']==0){ ?>
                    <td><center><font size="2"><img src="icon/logout_gray.png" title='Room Available' width="20px" height="20px" ></span></font></center></td>
                    <?php } ?>

                    <?php if($row['userID']!=0){ ?>
                    <td><center><font size="2"><a href="mode_edit_user.php?mode=out_room&&roomID=<?php echo $row['roomID']; ?>&&userID=<?php echo $row['userID']; ?>"><img src="icon/logout.png" title='Make this Empty' width="20px" height="20px" ></a></font></center></td>
                    <?php } ?>

                    <td><center><font size="-6"><a href="roomhistory.php?mode=delete_room&&roomID=<?php echo $row['roomID']; ?>">Delete</a></center></font></td>
                                    
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
