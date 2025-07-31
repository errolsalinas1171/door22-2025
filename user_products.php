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
</script>

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
               	<h1><font color="#ffffff">Please Select</font></h1>
               	<br><br>
					<a href="user_products_add.php" class="link brown">
						<div class="light"></div>
						<center>
							<table>
								<tr>
									<td>
										<img src="icon/add-to-cart.png" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;
									</td>
									<td>
										<font color="#252525">Products</font>
									</td>
								</tr>
							</table>
						</center>
					</a>
					<a href="user_products_wifi_add.php" class="link green">
						<div class="light"></div>
						<center>
							<table>
								<tr>
									<td withd="20%">
										<img src="icon/wifi.png" width="50px" height="50px">&nbsp;&nbsp;
									</td>
									<td>
										<font color="#252525">Wifi</font>
									</td>
								</tr>
							</table>
						</center>
					</a>
					<!-- <a href="user_pin_change.php?userID=<?php echo $_SESSION['userID']; ?>" class="link blue">
						<div class="light"></div>
						<center>
							<table>
								<tr>
									<td withd="20%">
										<img src="icon/pin.png" width="50px" height="50px">&nbsp;&nbsp;
									</td>
									<td>
										<font color="#252525">Change PIN</font>
									</td>
								</tr>
							</table>
						</center>
					</a> -->
					<a href="user_index.php" class="link red">
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


					<?php 
					$userID = $_SESSION['userID'];
					/** Check if there is an existing transaction on the Transaction table **/
					$trans = mysql_query("SELECT * FROM transaction WHERE userID='$userID' AND status='pending'");
				    $transCount = mysql_num_rows($trans);
				    $transDetails = mysql_fetch_array($trans);
				    $transID = $transDetails['transID'];
				    
				    if($transCount > 0){
				    ?>
						<a href="user_cart.php" class="link blue">
							<div class="light"></div>
							<center>
								<table>
									<tr>
										<td>
											<img src="icon/brand-identity.png" width="40px" height="40px">&nbsp;&nbsp;&nbsp;&nbsp;
										</td>
										<td>
											<font color="#252525"> Add-ons </font>
										</td>
									</tr>
								</table>
							</center>
						</a>
					<?php } ?>
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