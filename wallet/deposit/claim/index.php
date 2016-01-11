<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	exit(http_response_code(404));
} else {
	require '../../../script/db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $websitename;?></title>
	<link rel="icon" type="image/gif" href="/favicon.gif" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="<? echo $blockchain_root ?>Resources/wallet/pay-now-button-v2.js"></script>
    
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
	
	<form action="" method="POST">
<center><h3>Deposit BTC to your account</h3></center>
<center><h4>Please type code given that was given when you requested a bitcoin Address to deposit bitcoins</h4>
<input type="text" name="code" placeholder="Insert Code Here">
<br>
<input type="submit" value="Claim" name="submit" id="Button"/></center>
<?php
if(isset($_POST["submit"])){
$ID = $ID1;
$PW = $PW1;
$code = $_POST['code'];
$query3=mysql_query("SELECT * FROM deposit WHERE moneycode='".$code."'");
		$numrows3=mysql_num_rows($query3);
		$name = $row=mysql_fetch_array($query3);
		$STT = "1";
		if($numrows3!=0){
			if($name['status'] == 0){
	
	$address = $name['address'];
	$confirmations = "6";
$bal = json_decode(file_get_contents("https://blockchain.info/merchant/$ID/address_balance?password=$PW&address=$address&confirmations=$confirmations"), true);
$parsebal = $bal['balance'];
if ($parsebal != 0){
	$query4=mysql_query("SELECT * FROM members WHERE user='".$_SESSION["sess_user"]."'");
		$users = $row=mysql_fetch_array($query4);
		$money = $users['BTC'] + $parsebal; 
	$update = mysql_query("UPDATE deposit set status='" . $STT . "' WHERE moneycode='" . $code . "'");
	$change = mysql_query("UPDATE members set BTC='" . $money . "' WHERE user='" . $_SESSION["sess_user"] . "'");
	if($update){
		if($change){
	echo '<h4>Transaction Complete. Your bitcoin are now available on your acocunt</h4>';
	} else {
	echo '<h4>Something failed. Please try again</h4>';
	}
	}
} else {
	echo '<h4>The BTC are not confirmed yet. Please try again later.</h4>';
	echo 'Confirmed satoshi until now: '.$parsebal;
}
		} else {
		echo '<h4>This code has been used. Please try again</h4>';
		}
}
}
}
?>
</form>

   </div>
</div>
</body>
</html>