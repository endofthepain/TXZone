<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	exit(http_response_code(404));
} else {
	require '../script/db.php';
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
	 <center><h1 style="color:#ccc;">Wallet</h1></center>
	 <center><h2>Ballance</h2></center>
	 <center><h2>In satoshi: <?=$name['BTC'];?> satoshi</h2></center>
	 <center><h2>In BTC: <?=$BTC;?> BTC</h2></center>
	 <center><input type="submit" value="Deposit BTC" onclick="window.location='/wallet/deposit';" id="Button" />
	 <input type="submit" value="Withdraw BTC" onclick="window.location='/wallet/withdraw';" id="Button" /></center>
   </div>
</div>
</body>
</html>
<?php
}
?>