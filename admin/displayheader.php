
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th><font size="-6"><center>Header/Title</center></font></th>
                    <th><font size="-6"><center>Date Added</center></font></th>
                    <th><font size="-6"><center>Enable</center></font></th>
                </tr>
            </thead>
            <tbody>
<?php
include('dbconnect.php');
$amount='0';
$sql=mysql_query("SELECT * FROM header");

$OutLine = array('title'=>'', 'date_inputted'=>'', 'enable'=>'');

while($row=mysql_fetch_array($sql))
{
$OutLine['title'] = $row['title'];
$OutLine['date_inputted'] = $row['date_inputted'];
$OutLine['enable'] = $row['enable'];
$countsy=0;
if($row>$countsy)
{
    ?>
                <tr class="gradeX">
                    <td><center><font size="-6"><?php echo "".$row['title']."";?></center></font></td>

                    <?php $i=strtotime($row['date_inputted']); ?>
                    <td><center><font size="-6"><?php echo date("m/d/Y h:i A", $i);;?></center></font></td>

                    <?php if($row['enable']=='yes'){ ?>
                    <td><center><font size="-6"><a href="set_header.php?mode=disable&&headerID=<?php echo $row['headerID']; ?>"><img src="icon/ok_green.png" title='Disable This Header' width="18px" height="18px" ></a></center></font></td>
                    <?php } ?>

                    <?php if($row['enable']=='no'){ ?>
                    <td><center><font size="-6"><a href="set_header.php?mode=enable&&headerID=<?php echo $row['headerID']; ?>"><img src="icon/disabled.png" title='Enable This Header' width="15px" height="15px" ></a></center></font></td>
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
