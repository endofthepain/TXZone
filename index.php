<?php 
session_start();
		require 'script/db.php';
if(!isset($_SESSION["sess_user"])){
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $websitename;?></title>
	<link rel="icon" type="image/gif" href="/favicon.gif" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/script/style.css">
	<script>
		$(function() {

			$("#slideshow > div:gt(0)").hide();

			setInterval(function() {
			  $('#slideshow > div:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#slideshow');
			},  5000);

		});
	</script>
</head>
<body>
<div id="topbar">
		<ul>
		<center>
			<li><a href="/login">Login</a></li>
			<li><a href="/faq">FAQ</a></li>
			<li><a href="/about">About</a></li>
			<li><a href="/register">Register</a></li>
		</center>
		</ul>
	</div>
<div id="slideshow">
   <div id="container" style="color:#ccc;background-image: url(/image/1.jpg);background-size:100%;">
	 <center><h1><?php echo $websitename;?></h1></center>
	  <center><h2 style="color:#ccc;">Hello Guest</h2></center>
   </div>
   <div id="container" style="background-image: url(/image/1.jpg);background-size:100%;">
	 <center><h1 style="color:#ccc;"><?php echo $websitename;?></h1></center>
	 <center><h2 style="color:#ccc;">Here you can win up to 1 Bitcoin per month!</h2></center>
   </div>
   <div id="container" style="background-image: url(/image/1.jpg);background-size:100%;">
   <center><h1 style="color:#ccc;"><?php echo $websitename;?></h1></center>
	 <center><h2 style="color:#ccc;">Just visiting Websites</h2></center>
   </div>
   <div  id="container" style="background-image: url(/image/1.jpg);background-size:100%;">
   <center><h1 style="color:#ccc;"><?php echo $websitename;?></h1></center>
   <center><h3 style="color:#ccc;">Register now its free</h3></center>
   </div>
   <div  id="container" style="background-image: url(/image/1.jpg);background-size:100%;">
   <center><h1 style="color:#ccc;"><?php echo $websitename;?></h1></center>
   <center><h3 style="color:#ccc;">Register now its free</h3></center>
   <center><h3 style="color:#ccc;">and will always be</h3></center>
   </div>
</div>
</body>
</html>
<?php
} else {
	$result = mysql_query("SELECT *from members WHERE user='" . $_SESSION["sess_user"] . "'");
	$name = $row=mysql_fetch_array($result);
	$BTC = number_format($name['BTC'] / 100000000,5);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $websitename;?></title>
	<link rel="icon" type="image/gif" href="/favicon.gif" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/script/style2.css">
		<link rel="stylesheet" type="text/css" href="/script/theme.css">
	<style>
	#left{
	background:#151718;
	width:60px;
    height: 100%;
	position:absolute;
	}
	#up{
	background:#151718;
	width:100%;
    height: 3px;
	position:absolute;
	}
	</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>

	$(document).ready(function(){
		$('#sidebar-btn').click(function(){
			$('#sidebar').toggleClass('visible');
		});
	});

	</script>
	<script>
		$(function() {

			$("#slideshow > div:gt(0)").hide();

			setInterval(function() {
			  $('#slideshow > div:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#slideshow');
			},  5000);

		});
	</script>
</head>
<body>
<div id="left"></div>
<div id="up"></div>
	<div id="sidebar">

		<ul>
			<center><h1><?php echo $websitename;?></h1></center>
			<li><center><a>Menu</a></center></li>
			<li><a href="/">Home</a></li>
			<li><a href="/tasks">Tasks</a></li>
			<li><a href="/wallet">Wallet</a></li>
			<li><a href="/account">My Account</a></li>
			<li><a href="/logout">Logout</a></li>
			<li><a href="/faq">FAQ</a></li>
			<li><a href="/about">About</a></li>
		</ul>
		<div id="sidebar-btn">
			<span></span>
			<span></span>
			<span></span>
		</div>

	</div>
<div id="slideshow">
   <div id="container" style="color:#ccc;background-image: url(/image/1.jpg);background-size:100%;">
	 <center><h1 style="color:#ccc;"><?php echo $websitename;?></h1></center>
	 <center><h2>Hello <?php echo $_SESSION["sess_user"];?></h2></center>
   </div>
   <div id="container" style="background-image: url(/image/1.jpg);background-size:100%;">
	 <center><h1 style="color:#ccc;"><?php echo $websitename;?></h1></center>
	 <center><h2 style="color:#ccc;">Your current Balance is: <?=$BTC?> BTC</h2></center>
   </div>
   <div id="container" style="background-image: url(/image/1.jpg);background-size:100%;">
   <center><h1 style="color:#ccc;"><?php echo $websitename;?></h1></center>
	 <center><h2 style="color:#ccc;">
	 Your tasks
	 <?php
	 $query4=mysql_query("SELECT * FROM tasks WHERE user='".$_SESSION["sess_user"]."'");
	$numrows4=mysql_num_rows($query4);
	if($numrows4!=0){
		echo "are completed.";
	}else {
		echo "are not completed. Please complete today's tasks.";
	}
	 ?>
	 
	 </h2></center>
   </div>
</div>
</body>
</html>
<?php
}
?>