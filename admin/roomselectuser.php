<br><br>
<center>
<div>
      <div id="tablewrapper">
      <div id="tableheader">
            <div id="othersections"> 
            <div class="search">
            <div class="form-group" style="width:20%;">
            <select id="columns" onChange="sorter.search('query')" class="form-control"></select>
            <input type="text" placeholder="Search here..." id="query" onKeyUp="sorter.search('query')" / class="form-control">
            </div>
            </div>  
                        </div>
        <span class="details">
        <div style="padding-right:10px">
        <div class="big">Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
        </div>
        </span>
        </div>
        </div>

<div id="othersections">
<table width="100%">
<tr><td align="right">
<!--<div align="right"><button onClick="myFunction()" formtarget="_blank" class="btn btn-success">Print Records</button></div>-->
</td></tr>
</table>
</div>
        <table border="1" width="60%" class="table table-striped table-bordered table-hover" id="table" bgcolor="#FFFFFF">
            <thead>
                <tr>
                    <th><center><h5><strong>Client's #</strong></h5></center></th>
                    <th><center><h5><strong>Name</strong></h5></center></th>
                    <th><center><h5><strong>Contact #</strong></h5></center></th>
                    <th><center><h5><strong>Select</strong></h5></center></th>
                </tr>
            </thead>
            <tbody>
<?php
include('dbconnect.php');  
$roomID=$_GET['roomID'];  
$historyID=$_GET['historyID'];     
$sql=mysql_query("SELECT * from users WHERE user_type='user' && active='yes' && assigned='no' ORDER BY userID DESC");
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
                    <td><center><font size="2"><a href="mode_edit_user.php?mode=room_assign_client&&userID=<?php echo $row['userID']; ?>&&roomID=<?php echo $roomID; ?>&&historyID=<?php echo $historyID; ?>"><img src="icon/ok.png" title='Select Client' width="20px" height="20px" ></span></span></a></font></center></td>
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

       <div id="othersections">
        <div id="tablefooter">
        <div id="tablenav" align="center">
        <br>
                <div>
                    <img src="images/first.gif" width="16" height="16" title="First" alt="First Page" onClick="sorter.move(-1,true)" />
                    <img src="images/previous.gif" width="16" height="16" title="Previous" alt="First Page" onClick="sorter.move(-1)" />
                    <img src="images/next.gif" width="16" height="16" title="Next" alt="First Page" onClick="sorter.move(1)" />
                    <img src="images/last.gif" width="16" height="16" title="Last" alt="Last Page" onClick="sorter.move(1,true)" />
                </div><br><br>
                <div align="center">
                <div class="form-group" style="width:10%;">
                <table width="98%">
                <tr>
                <td align="center"><div class="huge">Go to</div></td>
                <td align="center"><select id="pagedropdown" class="form-control"></select></td>
                <td align="center"><div class="huge"><a href="javascript:sorter.showall()"> All</a></div></td>
                </tr>
                </table>
                </div>
                <div>
                </div>
                </div>
        </div>
        <div id="tablelocation" align="center">
                <div class="form-group" style="width:15%;">
                
                </div>
                <div class="page"><div class="big">Page <span id="currentpage"></span> of <span id="totalpages"><br></span></div></div>
        </div>
        </div>
<br>
    </center>

    </div>
    <script type="text/javascript" src="script2.js"></script>
    <script type="text/javascript">
    var sorter = new TINY.table.sorter('sorter','table',{
        headclass:'head',
        ascclass:'asc',
        descclass:'desc',
        evenclass:'evenrow',
        oddclass:'oddrow',
        evenselclass:'evenselected',
        oddselclass:'oddselected',
        paginate:true,
        size:20,
        colddid:'columns',
        currentid:'currentpage',
        totalid:'totalpages',
        startingrecid:'startrecord',
        endingrecid:'endrecord',
        totalrecid:'totalrecords',
        hoverid:'selectedrow',
        pageddid:'pagedropdown',
        navid:'tablenav',
        sortdir:1,
        columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
        init:true
    });
    </script>