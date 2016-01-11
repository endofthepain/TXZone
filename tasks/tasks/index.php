<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	exit(http_response_code(404));
} else {
			require '../../script/db.php';
					$query4=mysql_query("SELECT * FROM tasks WHERE user='".$_SESSION["sess_user"]."'");
	$numrows4=mysql_num_rows($query4);
	if($numrows4==0){
		$zero=0;
		mysql_query("INSERT INTO tasks(user,number) VALUES('".$_SESSION["sess_user"]."','$zero')");
	}
$numtasksel = mysql_query("SELECT * FROM tasks WHERE user='".$_SESSION["sess_user"]."'");
				$numtask = $row=mysql_fetch_array($numtasksel);
				if($numtask['number']<7){
$result = mysql_query("select count(1) from websites") 
or die(mysql_error());
$row = mysql_fetch_array($result);
$total = $row[0];
if($total!=0){
				$page = mysql_query("SELECT * FROM websites ORDER BY RAND() LIMIT 1");
				$pageid= mysql_fetch_array($page);
				$usersel = mysql_query("SELECT *from members WHERE user='" . $_SESSION["sess_user"] . "'");
				$user = $row=mysql_fetch_array($usersel);
				$tasksel = mysql_query("SELECT * FROM tasks WHERE user='".$_SESSION["sess_user"]."'");
				$task = $row=mysql_fetch_array($tasksel);
				$tasknu = $task['number']+1;
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
	var downloadButton = document.getElementById("next");
var counter = 60;
var newElement = document.createElement("p");
newElement.style.textAlign = "right"
newElement.innerHTML = "60";
var id;

downloadButton.parentNode.replaceChild(newElement, downloadButton);

id = setInterval(function () {
    counter--;
    if (counter < 0) {
        newElement.parentNode.replaceChild(downloadButton, newElement);
        clearInterval(id);
    } else {
        newElement.innerHTML = counter.toString();
    }
}, 1000);
	</script>
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

<form action="" method="POST">
   <center>
   <h1 style="color:#ccc;float: left;">Task Number: <?php echo $tasknu;?> of 7</h1>
<div id="next"> 
<img src="captcha.php" />
<input type="text" name="micronanopico">
   <input style="float: right;" type="submit" value="Next Task" name="submit" id="Button"/>
   </div>
	</center>
   </form>
<iframe src="<?php echo $pageid["link"];?>" width="99.7%" height="84%" align="right" sandbox></iframe>
   </div>
</div>
</body>
</html>
<?php
if(isset($_POST["submit"])){
if(isset($_POST["micronanopico"])&&$_POST["micronanopico"]!=""&&$_SESSION["code"]==$_POST["micronanopico"]){
					echo '<script language="javascript">';
			echo 'alert("Task number '. $tasknu .' completed")';
			echo '</script>';
$views = $pageid['views'] -1;
			$result=mysql_query("UPDATE websites set views='" . $views . "' WHERE link='" . $pageid["link"] . "'");
			if($views==0){
					$result2=mysql_query("DELETE FROM websites WHERE id='" . $pageid['id'] . "'");
			}

			if($result){
				$money = $user['BTC'] + 480000;
				$currtasks = $task['number'] + 1;
				mysql_query("UPDATE tasks set number='" . $currtasks . "' WHERE user='" . $_SESSION["sess_user"] . "'");
				mysql_query("UPDATE members set BTC='" . $money . "' WHERE user='" . $_SESSION["sess_user"] . "'");
?>
<META http-equiv="refresh" content="1;URL=/tasks/tasks/">
<?php
			}
}
}
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $websitename;?></title>
	<link rel="icon" type="image/gif" href="/favicon.gif" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/script/style2.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
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
	var downloadButton = document.getElementById("next");
var counter = 60;
var newElement = document.createElement("p");
newElement.style.textAlign = "right"
newElement.innerHTML = "60";
var id;

downloadButton.parentNode.replaceChild(newElement, downloadButton);

id = setInterval(function () {
    counter--;
    if (counter < 0) {
        newElement.parentNode.replaceChild(downloadButton, newElement);
        clearInterval(id);
    } else {
        newElement.innerHTML = counter.toString();
    }
}, 1000);
	</script>
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

   <center>
   <h1 style="color:#ccc;">There are no tasks available</h1>
	</center>
</div>
</div>
</body>
</html>
<?php
}
				} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $websitename;?></title>
	<link rel="icon" type="image/gif" href="/favicon.gif" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/script/style2.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
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
	var downloadButton = document.getElementById("next");
var counter = 60;
var newElement = document.createElement("p");
newElement.style.textAlign = "right"
newElement.innerHTML = "60";
var id;

downloadButton.parentNode.replaceChild(newElement, downloadButton);

id = setInterval(function () {
    counter--;
    if (counter < 0) {
        newElement.parentNode.replaceChild(downloadButton, newElement);
        clearInterval(id);
    } else {
        newElement.innerHTML = counter.toString();
    }
}, 1000);
	</script>
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

   <center>
   <h1 style="color:#ccc;">All tasks are done</h1>
	</center>
</div>
</div>
</body>
</html>
<?php
				}
}
?>
	