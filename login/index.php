<?php
require '../script/db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $websitename;?></title>
	<link rel="icon" type="image/gif" href="/favicon.gif" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/script/style.css">
</head>
<body>
<div id="topbar">
		<ul>
		<center>
			<li><a href="/">Back</a></li>
		</center>
		</ul>
	</div>
<div id="slideshow">
   <div id="container" style="color:#ccc;background-image: url(/image/1.jpg);background-size:100%;">
		<center>
			<form action="" method="POST">
			<h1>Login</h1>
			<input type="text" name="user" placeholder="Username">
			<input type="password" name="pass" placeholder="&#149;&#149;&#149;&#149;&#149;&#149;&#149;">
			<p></p>
			<center><input type="submit" value="Login" name="submit" id="Button" /></center>
			</form>
		</center>
	</div>
</div>
</body>
</html>
<?php
if(isset($_POST["submit"])){
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$query=mysql_query("SELECT * FROM members WHERE user='".$user."'");
	$numrows=mysql_num_rows($query);
if($numrows!=0){
	$name = $row=mysql_fetch_array($query);
	$ramdom= $name['nitid'];
	$md5pass=md5($pass + $ramdom);
	if(!empty($_POST['user']) && !empty($_POST['pass'])){
		$query=mysql_query("SELECT * FROM members WHERE user='".$user."' AND pass='".$md5pass."' AND nitid='".$ramdom."'");
		$numrows=mysql_num_rows($query);
		if($numrows!=0){
			while($row=mysql_fetch_assoc($query)){
				$dbusername=$row['user'];
				$dbpassword=$row['pass'];
				$active=$row['activated'];
			}
			if($user == $dbusername && $md5pass == $dbpassword && $active!=0){
				echo '<script language="javascript">';
			echo 'alert("Loged in")';
			echo '</script>';
				session_start();
				$_SESSION['sess_user']=$user;
?>
<META http-equiv="refresh" content="1;URL=/">
<?php
			} else {
				echo '<script language="javascript">';
			echo 'alert("ERROR: Account not active")';
			echo '</script>';
			}
		} else {
			echo '<script language="javascript">';
			echo 'alert("Username or password wrong")';
			echo '</script>';
		}
	
	} else {
			echo '<script language="javascript">';
			echo 'alert("There are blank spaces")';
			echo '</script>';
	}
} else {
	
}
}
?>