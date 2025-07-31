<br><br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th width="10%"><font size="-6"><center>Image</center></font></th>
                    <th><font size="-6"><center>Product Name</center></font></th>
                    <th><font size="-6"><center>Product Code</center></font></th>
                    <th><font size="-6"><center>Description</center></font></th>
                    <th><font size="-6"><center>Price</center></font></th>
                    <th><font size="-6"><center>Date Added</center></font></th>
                    <th><font size="-6"><center>Update</center></font></th>
                    <th><font size="-6"><center>Status</center></font></th>
                    <th><font size="-6"><center>Delete</center></font></th>
                </tr>
                </tr>
            </thead>
            <tbody>
<?php
include('dbconnect.php');
$amount='0';
$sql=mysql_query("SELECT * FROM products ORDER BY productID DESC");

$OutLine = array('product_name'=>'', 'product_code'=>'', 'product_description'=>'', 'product_price'=>'', 'date_added'=>'');

while($row=mysql_fetch_array($sql))
{
$OutLine['product_name'] = $row['product_name'];
$OutLine['product_code'] = $row['product_code'];
$OutLine['product_description'] = $row['product_description'];
$OutLine['product_price'] = $row['product_price'];
$OutLine['date_added'] = $row['date_added'];
$countsy=0;
if($row>$countsy)
{
    ?>
                <tr class="gradeX">
                    <td>
                        <center>
                            <a href="admin_products_edit_img.php?productID=<?php echo $row['productID']; ?>">
                                <img src="images/products/<?php echo $row['product_img']; ?>" width="100%">
                                <font size="1">Update Image</font>
                            </a>
                        </center>
                    </td>
                    <td><center><font size="-6"><?php echo "".$row['product_name']."";?></center></font></td>
                    <td><center><font size="-6"><?php echo "".$row['product_code']."";?></center></font></td>
                    <td><center><font size="-6"><?php echo "".$row['product_description']."";?></center></font></td>
                    <td><center><font size="-6"><?php echo "Php. ".number_format($row['product_price'],2)."";?></center></font></td>

                    <?php $i=strtotime($row['date_added']); ?>
                    <td><center><font size="-6"><?php echo date("m/d/Y h:i A", $i);;?></center></font></td>

                    <td><center><font size="2"><a href="admin_products_edit.php?mode=edit_product&&productID=<?php echo $row['productID']; ?>"><img src="icon/update.png" title='Update Details' width="20px" height="20px" ></a></font></center></td>
                    
                    <?php if($row['product_status']=='enabled'){ ?>
                        <td><center><a href="mode_edit_user.php?mode=product_enable&&productID=<?php echo $row['productID']; ?>"><img src="icon/ok_green.png" title='This Product is Enabled' width="18px" height="18px" ></a></center></td>
                    <?php } ?>

                    <?php if($row['product_status']=='disabled'){ ?>
                        <td><center><a href="mode_edit_user.php?mode=product_disable&&productID=<?php echo $row['productID']; ?>"><img src="icon/disabled.png" title='This Product is Disabled' width="15px" height="15px" ></a></center></td>
                    <?php } ?>

                    <td><center><font size="-6"><a href="roomhistory.php?mode=delete_product&&productID=<?php echo $row['productID']; ?>">Delete</a></center></font></td>
                                    
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
