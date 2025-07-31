<?php
include('block_user.php');
date_default_timezone_set('Asia/Manila');
$today=date("M d, Y h:i A");
$today_date=date("M d, Y");
$today_time=date("h:i A");
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


<!-- disable character -->

<script type="text/JavaScript">
function valid(f) {
!(/^[A-z&#209;&#241;0-9]*$/i).test(f.value)?f.value = f.value.replace(/[^A-z&#209;&#241;0-9]/ig,''):null;
} 
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

              <?php $type1=$_GET['type']; ?>
                <center>
               	<br><br>
               	<h1><font color="#ffffff">Please Enter Details</font></h1>
               	<br><br>
               	<form action="mode_cheque_number.php?mode=cheque_number&&type=<?php echo $type1; ?>" method="POST">
	               	<input type="text" name="envelop_no" placeholder="Envelop Number" style="width:400px; height:50px; border-radius: 5px;"><br><br>
	               	<input type="number" name="cheque_number" placeholder="Cheque Number" style="width:400px; height:50px; border-radius: 5px;">
	               	<div style="background-color:#011750; width:50%;">
	               	
	               	</div><br>
	             		<table>
	             			<tr>
	             				<td>
												<center><input type="submit" class="link green" value="&nbsp;&nbsp;&nbsp;&nbsp;  OKAY  &nbsp;&nbsp;&nbsp;&nbsp;">&nbsp;&nbsp;</center>
											</td>
											<td>
												<a href="user_payment.php"><input type="button" class="link red" value="&nbsp;&nbsp;&nbsp;&nbsp;  BACK  &nbsp;&nbsp;&nbsp;&nbsp;"></center></a>
											</td>
										</tr>
									</table>
								</form>
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
