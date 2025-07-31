<?php
include('block_user.php');
date_default_timezone_set('Asia/Manila');
$today=date("M d, Y - h:i A");
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

	/** This is for the Quantity box plus and minus **/
	$(document).ready(function() {
	document.getElementById('input').value = '0';
		$('.minus').click(function () {
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 0 ? 0 : count;
			$input.val(count);
			$input.change();
			return false;
		});
		$('.plus').click(function () {
			var $input = $(this).parent().find('input');
			$input.val(parseInt($input.val()) + 1);
			$input.change();
			return false;
		});
	});
</script>
<style type="text/css">
	span {cursor:pointer; }
	.number{
		margin:0px;
	}
	.minus, .plus{
		width:50px;
		height:50px;
		background:#f2f2f2;
		border-radius:4px;
		padding:8px 5px 8px 5px;
		border:1px solid #ddd;
		display: inline-block;
		vertical-align: middle;
		text-align: center;
	}
	input{
		height:50px;
		width: 100px;
		text-align: center;
		font-size: 26px;
		border:1px solid #ddd;
		border-radius:4px;
		display: inline-block;
		vertical-align: middle;
	}
</style>

</head>
<body>
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
               	<h1><font color="#ffffff">Please Select Wifi Voucher</font></h1>
               	<br><br>
       				<?php 
					$sql=mysql_query("SELECT * FROM wifi_vouchers WHERE wifi_voucher_days=7 AND voucher_status='enabled' AND is_added=0 ORDER BY voucherID ASC LIMIT 1");
					while($row=mysql_fetch_array($sql))
					{
					$countVoucher7=0;
					if($row>$countVoucher7)
				    {
					?>
						<a href="transactions.php?mode=wifi&&voucherID=<?php echo $row['voucherID']; ?>" class="link" style="background-color: #fff !important; border: 0px solid #000; height: 6.5em;" onclick="if(confirm('Are you sure you want to purchase Wifi Voucher?')){} else{event.preventDefault()};">
							<center>
								<table border="0">
									<tr>
										<td>
											<center>
												<img src="icon/wifi/wifi-7-days.png" width="70px" height="70px">
											</center>
										</td>
										<td>
											<center>
												<font style="font-family: sans-serif; color: #000; font-size: 30px;">
													7 Days
												</font><br>
												<font style="font-family: sans-serif; color: #ff3019; font-size: 13px; font-style: italic; font-weight: 600;">
													Php. <?php echo number_format($row['wifi_price'],2); ?>
												</font>
											</center>
										</td>
									</tr>
								</table>
							</center>
						</a>
					<?php 
						}
					}
					?>
       				<?php 
					$sql=mysql_query("SELECT * FROM wifi_vouchers WHERE wifi_voucher_days=15 AND voucher_status='enabled' AND is_added=0 ORDER BY voucherID ASC LIMIT 1");
					while($row=mysql_fetch_array($sql))
					{
					$countVoucher15=0;
					if($row>$countVoucher15)
				    {
					?>
						<a href="transactions.php?mode=wifi&&voucherID=<?php echo $row['voucherID']; ?>" class="link" style="background-color: #fff !important; border: 0px solid #000; height: 6.5em;" onclick="if(confirm('Are you sure you want to purchase Wifi Voucher?')){} else{event.preventDefault()};">
							<center>
								<table border="0">
									<tr>
										<td>
											<center>
												<img src="icon/wifi/wifi-15-days.png" width="70px" height="70px">
											</center>
										</td>
										<td>
											<center>
												<font style="font-family: sans-serif; color: #000; font-size: 30px;">
													15 Days
												</font><br>
												<font style="font-family: sans-serif; color: #ff3019; font-size: 13px; font-style: italic; font-weight: 600;">
													Php. <?php echo number_format($row['wifi_price'],2); ?>
												</font>
											</center>
										</td>
									</tr>
								</table>
							</center>
						</a>
					<?php 
						}
					}
					?>
       				<?php 
					$sql=mysql_query("SELECT * FROM wifi_vouchers WHERE wifi_voucher_days=30 AND voucher_status='enabled' AND is_added=0 ORDER BY voucherID ASC LIMIT 1");
					while($row=mysql_fetch_array($sql))
					{
					$countVoucher30=0;
					if($row>$countVoucher30)
				    {
					?>
						<a href="transactions.php?mode=wifi&&voucherID=<?php echo $row['voucherID']; ?>" class="link" style="background-color: #fff !important; border: 0px solid #000; height: 6.5em;" onclick="if(confirm('Are you sure you want to purchase Wifi Voucher?')){} else{event.preventDefault()};">
							<center>
								<table border="0">
									<tr>
										<td>
											<center>
												<img src="icon/wifi/wifi-30-days.png" width="70px" height="70px">
											</center>
										</td>
										<td>
											<center>
												<font style="font-family: sans-serif; color: #000; font-size: 30px;">
													30 Days
												</font><br>
												<font style="font-family: sans-serif; color: #ff3019; font-size: 13px; font-style: italic; font-weight: 600;">
													Php. <?php echo number_format($row['wifi_price'],2); ?>
												</font>
											</center>
										</td>
									</tr>
								</table>
							</center>
						</a>
					<?php 
						}
					}
					?>
					<br><br>
					<p>&nbsp;</p>
					<p>&nbsp;</p>

					<a href="user_products.php" class="link red">
						<div class="light"></div>
						<center>
							<table>
								<tr>
									<td>
										<img src="icon/back.png" width="40px" height="40px">&nbsp;&nbsp;&nbsp;&nbsp;
									</td>
									<td>
										<font color="#fff">&nbsp;Back&nbsp;</font>
									</td>
								</tr>
							</table>
						</center>
					</a>
					<br><br>
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


		<?php
            $name=mysql_query("SELECT * FROM users WHERE userID='$_SESSION[userID]'");
            $userID=mysql_fetch_array($name);
        ?>


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