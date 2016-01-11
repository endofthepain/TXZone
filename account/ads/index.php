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
	 <center><h1 style="color:#ccc;">Buy Website View Ads</h1>
	 <h2>Price per view: 0.0049 BTC</h2>
<form action="" method="POST">
<h3>Time: 60 seconds</h3>
<h3>Views (1 -> 60):</h3>
<input type="number" name="views" value="1">
<h3>Website Link (Example: http://www.example.com ):</h3>
<input type="text" name="link">
<p></p>
<input type="submit" name="submit" value="Buy Ads" id="Button" />
</form></center>
<?PHP
if(isset($_POST["submit"])){
	if(!empty($_POST["views"] && $_POST["link"])){
		if($_POST["views"]<61){
			$link=$_POST["link"];
			$buyer=$_SESSION["sess_user"];
			$view=$_POST["views"];
			$COST=$_POST["views"]*$adsprice;
			$result = mysql_query("SELECT *from members WHERE user='" . $_SESSION["sess_user"] . "'");
			$row=mysql_fetch_array($result);
			if($row["BTC"]-$COST>0){
				$sql="INSERT INTO websites(link,views,owner) VALUES('$link','$view','$buyer')";
				$sql2="INSERT INTO buylog(link,views,owner) VALUES('$link','$view','$buyer')";
				$result2=mysql_query($sql2);
				mail($ownerdebugemail,$websitename." - ".$buyer,"Views: ".$view."\n Link: ".$link);
				$result=mysql_query($sql);
				if($result){
				
					$_PAY= $row["BTC"] -$COST;
					mysql_query("UPDATE members set BTC='" . $_PAY . "' WHERE user='" . $_SESSION["sess_user"] . "'");
					echo "<h3>Sucessfuly bought</h3>";
		
				} else {
				
					echo "<h3>Something failed</h3>";
				
				}
			} else {
				
				if($row["BTC"]-$COST==0){
					$sql="INSERT INTO websites(link,views,owner) VALUES('$link','$view','$buyer')";
					$sql2="INSERT INTO buylog(link,views,owner) VALUES('$link','$view','$buyer')";
					$result2=mysql_query($sql2);
						mail($ownerdebugemail,$websitename." - ".$buyer,"Views: ".$view."\n Link: ".$link);
					$result=mysql_query($sql);
					if($result){

						$_PAY= $row["BTC"] -$COST;
						mysql_query("UPDATE members set BTC='" . $_PAY . "' WHERE user='" . $_SESSION["sess_user"] . "'");

						echo "<h3>Sucessfuly bought</h3>";
								
					} else {
				
						echo "<h3>Something failed</h3>";
				
					}
				} else {
					echo "<h3>Insuficient Bitcoins</h3>";
				}
				
			}
		} else {
			echo "<h3>Something failed</h3>";
		}
	}else{
		echo "<h3>There are blank spaces</h3>";
	}
}
}
?>
   </div>
</div>
</body>
</html>
