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
  <center>  <form action="" method="POST">
  <h2>Report an issue/bug/exploit/vulnerability/etc...</h2>
  <TEXTAREA Name="description" placeholder="Title (Max 50 characters)" ROWS=2 COLS=20></TEXTAREA>
<br>
<TEXTAREA Name="message" placeholder="Message (Max 500 characters)" ROWS=2 COLS=20></TEXTAREA>
<p></p>
<input type="submit" value="Send" name="submit" id="Button"/>
</form></center>
   </div>
</div>
</body>
</html>
<?php
if(isset($_POST["submit"])){
$textlimit = 500; 
$desclimit = 50;
$user=$_SESSION["sess_user"];
$description=$_POST["description"];
$message=$_POST["message"];
if (strlen($_POST['message']) <= $textlimit){
	if (strlen($_POST['description']) <= $desclimit){
	if(!empty($_POST["description"] && $_POST['message'])){
	$sql="INSERT INTO bugreport(user,title,message) VALUES('$user','$description','$message')";
		$result=mysql_query($sql);
			if($result){
				if(mail($ownerdebugemail,$websitename." - Report","Report name: \n".$description."\n Message: \n".$message."\n Thank you")){
	echo '<script language="javascript">';
			echo 'alert("Report Submited")';
			echo '</script>';
			}
			}
	} else {
		echo '<script language="javascript">';
			echo 'alert("There are blank spaces")';
			echo '</script>';
	}
} else {
	echo '<script language="javascript">';
			echo 'alert("Title must have less than 50 characters")';
			echo '</script>';
}
} else {
	echo '<script language="javascript">';
			echo 'alert("Message must have less than 500 characters")';
			echo '</script>';
}
}
}
?>