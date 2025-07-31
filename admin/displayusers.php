
<div id="othersections">
<div align="right"><a href="admin_user_add.php"><button class="btn btn-success">Add Client</button></a></div>
</div>

<br><br>
<style type="text/css" media="print">
body 
        {
            background-color:#FFFFFF; 
            margin: 20px;  /* the margin on the content before printing */
            margin-bottom: 20px;
       }
@media print {
   #othersections {display: none;}
             }
</style>


                <script>
                    function myFunction() {
                    window.print();
                    }
</script>

<center>
<div>
      <div id="tablewrapper">
      <div id="tableheader">
                        <div class="well">  
                        <center>
                        <div class="large"><font size="4">List of All Clients</font></div>
                        </center>
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
                    <th><center><h5><strong>Company Name</strong></h5></center></th>
                    <th><center><h5><strong>Contact #</strong></h5></center></th>
                    <!--<th><center><h5><strong>Email</strong></h5></center></th>
                    <th><center><h5><strong>Address</strong></h5></center></th>
                    <th><center><h5><strong>Date Added</strong></h5></center></th>
                    <th><center><h5><strong>Date Updated</strong></h5></center></th>-->
                    <th><center><h5><strong>Account #</strong></h5></center></th>
                    <th><center><h5><strong>PIN #</strong></h5></center></th>
                    <th><center><h5><strong>Update</strong></h5></center></th>
                    <th><center><h5><strong>Active</strong></h5></center></th>
                    <th><center><h5><strong>Details</strong></h5></center></th>
                    <th><center><h5><strong>Delete</strong></h5></center></th>
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
                    <td><center><font size="2"><?php echo $row['company_name'];?></center></font></td>
                    <td><center><font size="2"><?php echo $row['contact_number'];?></center></font></td>
                    <!--<td><center><font size="2"><?php echo $row['email'];?></center></font></td>
                    <td><center><font size="2"><?php echo $row['address'];?></center></font></td>
                    <?php $i=strtotime($row['date_added']); ?>
                    <td><center><font size="2"><?php echo date("M/d/Y h:i A", $i);?></center></font></td>
                    <?php if($row['date_updated']=='0000-00-00 00:00:00'){?>
                        <td><center><font size="2">Never</center></font></td>
                    <?php } ?>
                    <?php if($row['date_updated']!='0000-00-00 00:00:00'){?>
                        <?php $i=strtotime($row['date_updated']); ?>
                        <td><center><font size="2"><?php echo date("M/d/Y h:i A", $i);;?></center></font></td>
                    <?php } ?>-->
                    <td><center><font size="2"><?php echo $row['username'];?></center></font></td>
                    <td><center><font size="2"><?php echo $row['password'];?></center></font></td>
                    <td><center><font size="2"><a href="mode_edit_user.php?mode=edit_user&&userID=<?php echo $row['userID']; ?>"><img src="icon/update.png" title='Update Details' width="20px" height="20px" ></span></span></a></font></center></td>
                    <?php if($row['active']=='yes'){?>
                        <td><center><font size="2"><a href="user_set_active.php?mode=enable&&userID=<?php echo $row['userID']; ?>"><img src="icon/ok_green.png" title='Disable this Client' width="20px" height="20px" ></span></span></a></font></center></td>
                    <?php } ?>
                    <?php if($row['active']=='no'){?>
                        <td><center><font size="2"><a href="user_set_active.php?mode=disable&&userID=<?php echo $row['userID']; ?>"><img src="icon/disabled.png" title='Enable this Client' width="20px" height="20px" ></span></span></a></font></center></td>
                    <?php } ?>
                     <td><center><font size="2"><a rel='facebox' href=popup_client_details.php?userID=<?php echo $row['userID']; ?>>View</span></span></a></font></center></td>
                     <td><center><font size="2"><a href="roomhistory.php?mode=delete_client&&userID=<?php echo $row['userID']; ?>">Delete</span></span></a></font></center></td>
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
                <div class="page"><div class="big"><br>Page <span id="currentpage"></span> of <span id="totalpages"><br></span></div></div>
        </div>
        </div>
</center>
<br>
    

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