<?php
include("dbconnect.php");
session_start();
if(!isset($_SESSION['userID'])){	
echo "<script language='Javascript'>
			alert('Sorry, you are not logged in. Please login first!');
			location.href='admin_login.html';
			</script>";
			die . mysql_error();				
}	
else if($_SESSION['in_use']!="yes"&&$_SESSION['user_type']!="admin"){	
?>
<script language="Javascript">
			alert("Access Denied!");
			location.href="logout.php?userID=<?php echo $_SESSION['userID']; ?>";
			</script>
<?php
}
?>
