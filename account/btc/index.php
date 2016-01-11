<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	exit(http_response_code(404));
} else {
	require '../../script/db.php';
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
	 <center><h1 style="color:#ccc;">Change Bitcoin Address</h1>	 <form action="" method="POST">
<input type="text" name="old" placeholder="Old Bitcoin Address">
<input type="text" name="new" placeholder="New Bitcoin Address">
<p></p>
<center><input type="submit" value="Change Bitcoin Address" name="submit" id="Button" /></center>
</form></center>
<?php
if(isset($_POST["submit"])){
	if(!empty($_POST['old']) && !empty($_POST['new'])){
	$result = mysql_query("SELECT *from members WHERE user='" . $_SESSION["sess_user"] . "'");
	$name = $row=mysql_fetch_array($result);
	$oldbtc=$_POST["old"];
	$new=$_POST["new"];
	if($name['btcadd']==$oldbtc){
		if($_POST["new"]!=$name['btcadd']){
	mysql_query("UPDATE members set btcadd='" . $new . "' WHERE user='" . $_SESSION["sess_user"] . "'");
		if(mail($name['email'],$websitename." - Bitcoin Address Changed","Your Bitcoin Address has been changed to ".$new.".\n If wasn't you please contact the administrator.")){
	echo '<h3>Bitcoin Address changed</h3>';
		
?>
<META http-equiv="refresh" content="1;URL=/account/">
<?php
		}
		} else {
			echo '<h3>The new Bitcoin Address is the same as the old one</h3>';
		}
	} else {
		echo '<h3>The Bitcoin Address is not the same</h3>';
	}
	} else {
	echo '<h3>There are blank spaces</h3>';
	}
	
}
}
?>
   </div>
</div>
</body>
</html>