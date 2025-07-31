<?php
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

<!-- LOGIN -->

        <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);



.login input[type=text]{
	width: 350px;
	height: 60px;
	background: transparent;
	border: 2px solid rgba(255,255,255,10);
	border-radius: 5px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 350px;
	height: 60px;
	background: transparent;
	border: 2px solid rgba(255,255,255,10);
	border-radius: 5px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 360px;
	height: 65px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,10);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,10);
}

.login input[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,10);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,10);
}
    </style>

    
        <script src="js/prefixfree.min.js"></script>



<!-- LOGIN CLOSING TAG -->


<title>Door22 - Payment Kiosk</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Beautyou  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="applisalonion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
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


<script language="javascript" type="text/javascript">
	var timeout = setInterval(reloadChat, 1000);    
	function reloadChat () 
	{
		 $('#refreshtime').load('login.php #refreshtime');
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
                      <a href="index.php"><h1><font color="#ffffff"><?php echo  $header_display['title'] ?></font></h1></a>
				   </div>
				     <div class="phone">
				      <h5><img src="images/logo.png" width="100" height="47"></h5>
					</div>
	               <div class="clearfix"></div>
					<!--//logo-->
              </div>
			   <div class="banner-inner"><br>
									<table width="100%" height="50%">
										<tr>
											<td>
								
		<br><br><br>
		<center>
		<div align="center" class="login">
			<form action="login.php" method="post">
			<font color="#ff0000" size="4">Error! Wrong PIN.</font><br><br>
				<input type="text" placeholder="Account Number" name="username"><br>
				<input type="password" placeholder="PIN Number"name="password"><br>
				<input type="submit" value="Login">
			</form>
		</div>
		</center>
    
    	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    									</td>
    								</tr>
    							</table>

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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

</body>
</html>