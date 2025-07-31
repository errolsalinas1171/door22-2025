<?php
include('block_user.php');
date_default_timezone_set('Asia/Manila');
$today=date("M d, Y h:i A");
$today_date=date("M d, Y");
$today_time=date("h:i A");

/** Check if input amount is greater than the total **/
$type1=$_GET['type'];

/** Get User and Room details **/
$sessUserID = $_SESSION['userID'];
$roomID=mysql_query("SELECT * FROM rooms WHERE userID='$sessUserID'");
$room_display=mysql_fetch_array($roomID);
$roomPrice = $room_display['room_price'];

/** Check if there is an existing PRODUCT transaction on the Transaction table **/
$transactionProd = mysql_query("SELECT * FROM transaction WHERE userID='$sessUserID' AND type='product' AND status='pending'");
$transactionProdCount = mysql_num_rows($transactionProd);
$transactionProdDetails = mysql_fetch_array($transactionProd);
$transProdID = $transactionProdDetails['transID'];

/** Check if there is an existing WIFI VOUCHER transaction on the Transaction table **/
$transactionWifi = mysql_query("SELECT * FROM transaction WHERE userID='$sessUserID' AND type='wifi' AND status='pending'");
$transactionWifiCount = mysql_num_rows($transactionWifi);
$transactionWifiDetails = mysql_fetch_array($transactionWifi);
$transWifiID = $transactionWifiDetails['transID'];

/** Get Product's total transaction price **/
$prodGrandTotal = 0;
$sqlprod = mysql_query("SELECT * FROM transaction_products WHERE transID='$transProdID' AND status='pending'");
while($row=mysql_fetch_array($sqlprod))
{
	$prodTotal = $row['product_price'] * $row['product_qty'];
	$prodGrandTotal+=$prodTotal;
}

/** Get Wifi's total transaction price **/
$wifiGrandTotal = 0;
$sqlwifi = mysql_query("SELECT * FROM transaction_wifi WHERE transID='$transWifiID' AND status='pending'");
while($row=mysql_fetch_array($sqlwifi))
{
	$wifiTotal = $row['wifi_price'] * $row['wifi_qty'];
	$wifiGrandTotal+=$wifiTotal;
}

$amount = $_GET['amount']; 

$totalPrice = $room_display['room_price'] + $prodGrandTotal + $wifiGrandTotal;

if($amount < $totalPrice){
	echo "<script language='Javascript'>
		alert('Amount entered is less than the overall total price.');
		location.href='user_amount.php?type=".$type1."';
		</script>";
		die . mysql_error();
}
?>	
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Door22 - Payment Kiosk</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Beautyou  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="applisalonion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/buttons.css" rel='stylesheet' type='text/css' />	
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!--/web-font-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600,600italic,800' rel='stylesheet' type='text/css'>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>

</head>
<body>


		<?php
            $name=mysql_query("SELECT * FROM users WHERE userID='$_SESSION[userID]'");
            $userID=mysql_fetch_array($name);
        ?>
<!--start-home-->
		<div class="banner" id="home">
			<div class="container">
			  <div class="head-top">
			  <!--logo-->
		      <div class="logo">
		       	<?php
		       	include('dbconnect.php');
	        			$header=mysql_query("SELECT * FROM header WHERE enable='yes'");
	        			$header_display=mysql_fetch_array($header);
	    			?>
	          <a href="user_index.php"><h1><font color="#ffffff"><?php echo  $header_display['title'] ?></font></h1></a>
				  </div>
				    <div class="phone">
				      <h5><img src="images/logo.png" width="100" height="47"></h5>
						</div>
	               <div class="clearfix"></div>
				<!--//logo-->
              </div>
                <center>
	               	<br><br>
	               	<h1><font color="#ffffff">All Details</font></h1>
	               	<br>
	               	<div style="background-color:#011750; width:50%;">
										<?php if($roomPrice > 0){ ?>
			               	<h1>
			               		<font size="4" color="#ffffff">
													Room: <?php echo "Php ".number_format($room_display['room_price'],2); ?>
												</font>
											</h1>
										<?php } ?>
										<?php if($prodGrandTotal > 0 || $wifiGrandTotal > 0){ ?>
			               	<h1>
			               		<font size="4" color="#ffffff">
													Add-ons: Php. <?php echo number_format($prodGrandTotal + $wifiGrandTotal,2); ?>
												</font>
											</h1>
										<?php } ?>
		               	<h1>
		               		<font size="4" color="#ffffff">
												Total: 
												Php. <?php 
													$totalPrice = $room_display['room_price'] + $prodGrandTotal + $wifiGrandTotal;
													echo number_format($totalPrice,2);
												?>
											</font>
										</h1>
										<!-- <a href="user_cart.php" style="color: #fff;">
											<button style="background-color: #d00030; font-size: 15px; padding: 5px; border-radius: 5px;">
												View Transaction Details
											</button>
										</a> -->
		               	<h1>
		               		<font size="4" color="#ffffff">
		               			Date : <?php echo $today_date; ?> | Time : <?php echo $today_time; ?>
		               		</font>
		               	</h1>
		               	<h1>
		               		<font size="4" color="#ffffff">
		               			Name : <?php $fullname=$userID['last_name'].", ".$userID['first_name']." ".$userID['middle_name']; echo $fullname; ?>
		               		</font>
		               	</h1>
		                <h1>
		                	<font size="4" color="#ffffff">
		                		Payment Type : <?php $view_type=$_GET['type']; if ($view_type=='cash'){echo "Cash";} ?>
		                	</font>
		                </h1>
		               	<h1>
		               		<font size="4" color="#ffffff">
		               			Amount : Php. <?php $view_amount=$_GET['amount']; echo number_format($view_amount,2); ?>
		               		</font>
		               	</h1>
		               	<h1>
		               		<font size="4" color="#ffffff">
		               			Envelop Number : <?php $view_envelop_no=$_GET['envelop_no']; echo $view_envelop_no; ?>
		               		</font>
		               	</h1>
		               	<br>
	                </div>
	                <?php $username=$userID['username']; ?>

									<a href="mode_save.php?mode=save&&transProdID=<?php echo $transProdID; ?>&&transWifiID=<?php echo $transWifiID; ?>&&total=<?php echo $totalPrice; ?>&&amount=<?php echo $view_amount; ?>&&type=<?php echo $view_type; ?>&&fullname=<?php echo $fullname; ?>&&username=<?php echo $username; ?>&&envelop_no=<?php echo $view_envelop_no; ?>" class="link green">
										<div class="light"></div>
										<center>
											<table>
												<tr>
													<td>
														<img src="icon/ok_white.png" width="40px" height="40px">&nbsp;&nbsp;&nbsp;&nbsp;
													</td>
													<td>
														<font color="#252525">&nbsp;&nbsp;OK&nbsp;&nbsp;</font>
													</td>
												</tr>
											</table>
										</center>
									</a>
									<a href="user_payment.php" class="link red">
										<div class="light"></div>
										<center>
											<table>
												<tr>
													<td withd="20%">
														<img src="icon/back.png" width="40px" height="40px">&nbsp;&nbsp;&nbsp;&nbsp;
													</td>
													<td>
														<font color="#252525">Back</font>
													</td>
												</tr>
											</table>
										</center>
									</a>
								</center>
			   		<div class="banner-inner">

						<!--banner-Slider-->
						<script src="js/responsiveslides.min.js"></script>
						 <script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
						auto: true,
						pager: true,
						nav:false,
						speed: 500,
						namespace: "callbacks",
						before: function () {
						  $('.events').append("<li>before event fired.</li>");
						},
						after: function () {
						  $('.events').append("<li>after event fired.</li>");
						}
						  });

						});
						  </script>

			   </div>
		    </div>
		</div>




	   <div class="header-bottom">
			  <div class="fixed-header">
			     <div class="menu">Menu</div>
					<span class="menu"> </span>
					<div class="top-menu">
						<div id="refreshtime">
					<nav>
					<ul class="cl-effect-16">
						<li><h1><font color="#fff">Hi <?php echo  $userID['first_name'] ?>!</font></h1></li>
						<li><h1><font color="#fff"><?php echo $today; ?></font></h1></li>
					</ul>
					</nav>
						</div>
					</div>

				 <div class="clearfix"></div>
				<!-- script for menu -->
						<script>
						$( "span.menu" ).click(function() {
						  $( ".top-menu" ).slideToggle( "slow", function() {
							// Animation complete.
						  });
						});
					</script>
					<!-- script for menu -->
					<script>
				$(document).ready(function() {
					 var navoffeset=$(".header-bottom").offset().top;
					 $(window).scroll(function(){
						var scrollpos=$(window).scrollTop(); 
						if(scrollpos >=navoffeset){
							$(".header-bottom").addClass("fixed");
						}else{
							$(".header-bottom").removeClass("fixed");
						}
					 });
					 
				});
				</script>
			 </div>
		</div>

</body>
</html>