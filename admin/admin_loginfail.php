<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Door22 - Payment Kiosk - Administration Login</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  <link rel="stylesheet" href="css/style_login.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <br><br><br><br>
  <section class="container">
    <div class="login">
      <br>
      <h1>Administration Login</h1>
      <center><font size="4" color="#55555a">Door 22 Residence</font></center>
      <center><font size="2" color="#55555a">Pres. Magsaysay St. Cebu City</font></center>
      <center><font size="2" color="#55555a">
        Tel. No.: (032) 316 7265<br>
        Mobile: +63 917 314 9096<br><br>
        </font>

        <font color="#ff0000" >Error Sign in! Wrong input Username or Password.</font>
        
        </center>
      <form method="post" action="admin_login.php">
        <br>
        <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
        <br>
      </form>
    </div>
      
  </section>

</body>
</html>