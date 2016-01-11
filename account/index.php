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
	 <center><h1 style="color:#ccc;">Account Details</h1></center>
	 <center><h2>Username: <?=$_SESSION["sess_user"];?></h2></center>
	 <center><h2>Email: <?=$name['email'];?></h2></center>
	 <center><h2>BTC Address: <?=$name['btcadd'];?></h2></center>
	 <center><h2>Ballance: <?=$BTC;?> BTC</h2></center>
	 <center>
	 <input type="submit" value="Withdraw/Deposit Bitcoins" onclick="window.location='/wallet';" id="Button" />
	  <input type="submit" value="Change Password" onclick="window.location='/account/password';" id="Button" />
	 <input type="submit" value="Change BTC Address" onclick="window.location='/account/btc';" id="Button" />
	 <input type="submit" value="Buy website trafic" onclick="window.location='/account/ads';" id="Button" />
	 <input type="submit" value="Report a Bug/Exploit" onclick="window.location='/account/report';" id="Button" />
	 </center>
   </div>
</div>
</body>
</html>
<?php
}
?>