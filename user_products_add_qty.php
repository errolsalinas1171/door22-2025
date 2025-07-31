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
	document.getElementById('input').value = '1';
		$('.minus').click(function () {
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
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
		width:70px;
		height:70px;
		background:#f2f2f2;
		border-radius:4px;
		padding:8px 5px 8px 5px;
		border:1px solid #ddd;
		display: inline-block;
		vertical-align: middle;
		text-align: center;
    	font-size: 35px;
	}
	input{
		height:70px;
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
               	<h1><font color="#ffffff">Please add Product quantity</font></h1>
               	<br><br>
               	<form action="transactions.php?mode=product" method="POST">
	   				<?php 
       				$productID = $_GET['productID'];
					$sql=mysql_query("SELECT * FROM products WHERE productID='$productID'");
					while($row=mysql_fetch_array($sql))
					{
					?>	
						<textarea hidden name="productID"><?php echo $productID; ?></textarea>
	       				<tr>
	       					<td align="right">
	       						<font style="font-family: sans-serif; color: #ffffff; font-size: 55px;"><?php echo $row['product_name']; ?></font><br>
	       						<font style="font-family: sans-serif; color: #ffffff; font-size: 25px;">Php. <?php echo number_format($row['product_price'],2); ?></font>
	       						<p>&nbsp;</p>
								<span class="minus">-</span>
								<input type="text" id="input" name="product_qty" />
								<span class="plus">+</span>
							</td>
						</tr>
					<?php } ?>
					<br><br>
					<p style="color: #ffffff; font-size: 23px;">Note: Payment will be charged automatically to your account.</p>
					<p>&nbsp;</p>

					<button type="submit" class="link green">
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
					</button>
					
					<a href="user_products_add.php">
						<button type="button" class="link red">
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
						</button>
					</a>
					<br><br>
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