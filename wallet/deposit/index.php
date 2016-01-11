<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	exit(http_response_code(404));
} else {
require '../../script/db.php';

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
<center><input type="submit" value="Request Bitcoin Address" name="submit" id="Button"/></center>
</form>
<center><input type="submit" value="Claim deposit" name="submit" id="Button" onclick="location.href = '/wallet/deposit/claim';"/></center>
<?php
if(isset($_POST["submit"])){
$ID = $ID1;
$PW = $PW1;
 
$newAddy = json_decode(file_get_contents("https://blockchain.info/merchant/$ID/new_address?password=$PW"), true);
 
$parseAddy = $newAddy['address'];
  $user=$_SESSION["sess_user"];
 $moneycode=md5(rand() + $parseAddy );
 $status="0";
  $query3=mysql_query("SELECT * FROM deposit WHERE moneycode='".$moneycode."'");
		$numrows3=mysql_num_rows($query3);
		if($numrows3==0){
$sql="INSERT INTO deposit(user,address,moneycode,status) VALUES('$user','$parseAddy','$moneycode','$status')";
$result=mysql_query($sql);
$result2 = mysql_query("SELECT *from members WHERE user='" . $_SESSION["sess_user"] . "'");
	$name2 = $row=mysql_fetch_array($result2);
	$email = $name2['email'];
if(mail($email,$websitename." - Deposit BTC","The code to claim your bitcoins after the transaction is confirmed is: ".$moneycode)){
			if($result){
				echo '<center><h3>Minimum value per transaction acceptable by the system: 0.008477 BTC</h3></center>';
echo '<h4>Please send BTC to: '.$parseAddy;
 echo '</h4>';
echo '<h4>Code to claim your BTC of this address on your account after the transfer is confirmed: '.$moneycode;
echo '</h4>';
			} else {
				echo "<h4>Something Failed</h4>";
			}
}
}
}
}
?>
   </div>
</div>
</body>
</html>