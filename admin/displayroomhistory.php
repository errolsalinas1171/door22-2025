
<!--
<script>
function myFunction() {
    var myWindow = window.open("reports-room-history.php", "", "width=950, height=800");
}
</script>


<div id="othersections">
<div align="right"><button class="btn btn-success" onclick="myFunction()">Print</button></div>
</div>
--><br><br>
        <center>
            <h3><strong>All Rooms History</strong></h3>
        </center><br><br>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th><font size="-6"><center>Room Number</center></font></th>
                    <th><font size="-6"><center>Client's Name</center></font></th>
                    <th><font size="-6"><center>Start Date</center></font></th>
                    <th><font size="-6"><center>End Date</center></font></th>
                    <th><font size="-6"><center>Status</center></font></th>
                    <th><font size="-6"><center>Delete</center></font></th>
                </tr>
            </thead>
            <tbody>
<?php
include('dbconnect.php');
$amount='0';
$sql=mysql_query("SELECT * FROM room_history");

$OutLine = array('roomID'=>'', 'userID'=>'', 'date_start'=>'', 'date_end'=>'');

while($row=mysql_fetch_array($sql))
{
$OutLine['roomID'] = $row['roomID'];
$OutLine['userID'] = $row['userID'];
$OutLine['date_start'] = $row['date_start'];
$OutLine['date_end'] = $row['date_end'];
$countsy='0';
if($row>$countsy)
{
    ?>
                <tr class="gradeX">
                    <td><center><font size="-6">
                    <?php
                    include('dbconnect.php');
                    $room=mysql_query("SELECT * FROM rooms WHERE roomID=".$row['roomID']."");
                    $room_display=mysql_fetch_array($room);

                        echo $room_display['room_no'];
                    ?>
                    </center></font></td>
                    <td><center><font size="-6">
                    <?php
                    include('dbconnect.php');
                    $client=mysql_query("SELECT * FROM users WHERE userID=".$row['userID']."");
                    $client_display=mysql_fetch_array($client);

                        echo "".$client_display['last_name'].", ".$client_display['first_name']." ".$client_display['middle_name']."";
                    ?>
                    </center></font></td>

                    <?php $date_start=strtotime($row['date_start']); ?>
                    <td><center><font size="-6"><?php echo date("m/d/Y h:i A", $date_start);;?></center></font></td>

                    <?php if($row['date_end']=='0000-00-00 00:00:00'){ ?> 
                    <td><center><font size="-6">---- -- -- -- -- --</center></font></td>
                    <?php } ?> 


                    <?php if($row['date_end']!='0000-00-00 00:00:00'){ ?> 
                    <?php $date_end=strtotime($row['date_end']); ?>
                    <td><center><font size="-6"><?php echo date("m/d/Y h:i A", $date_end);;?></center></font></td>
                    <?php } ?> 


                    <?php if($row['status']=='out'){ ?> 
                    <td><center><font size="-6">Out</center></font></td>
                    <?php } ?> 

                    <?php if($row['status']=='active'){ ?> 
                    <td><center><font size="-6">Active</center></font></td>
                    <?php } ?> 

                    <td><center><font size="-6"><a href="roomhistory.php?mode=delete&&historyID=<?php echo $row['historyID']; ?>">Delete</a></center></font></td>

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

<br><br><br>

