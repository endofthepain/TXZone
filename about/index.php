<?PHP
require '../script/db.php';
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
			<li><a href="/">Voltar</a></li>
		</center>
		</ul>
	</div>
<div id="slideshow">
	<div id="container" style="color:#ccc;background-image: url(/image/1.jpg);background-size:100%;">
	 <center><h1>Developer, Creator and Designer of TXZone V1.0 Alpha:</h1></center>
	 <center><h2>ZenJB</h2></center>
	</div>
	<div id="container" style="color:#ccc;background-image: url(/image/1.jpg);background-size:100%;">
	 <center><h1>Email</h1></center>
	 <center><h2>0zenjb0@gmail.com</h2></center>
	</div>
	<div id="container" style="color:#ccc;background-image: url(/image/1.jpg);background-size:100%;">
	 <center><h1>BitcoinTalk Profile</h1></center>
	 <center><h2>https://bitcointalk.org/index.php?action=profile;u=548581</h2></center>
	</div>
</div>
</body>
</html>