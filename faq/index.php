<?php
require '../script/db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $websitename;?></title>
	<link rel="icon" type="image/gif" href="/favicon.gif" />
	<link rel="stylesheet" type="text/css" href="/script/faq.css">
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
<div id="sidebar">
	<ul>
		<center><h1 style="color:grey">FAQ</h1></center>
		<center><h2 style="color:grey">General</h2></center>
		<li><a href="#1">How does this website works</a></li>
		<li><a href="#2">Is this site sustainable</a></li>
		<li><a href="#8">How can I contribute to the development of this website</a></li>
		<center><h2 style="color:grey">For Users</h2></center>
		<li><a href="#3">Advantages</a></li>
		<li><a href="#4">How can I win Bitcoins</a></li>
		<li><a href="#5">Payments</a></li>
		<center><h2 style="color:grey">For Advertisers</h2></center>
		<li><a href="#6">Advantages for Advertisers</a></li>
		<li><a href="#7">How to buy Web Trafic</a></li>

	</ul>
	<div id="sidebar-btn">
		<span></span>
		<span></span>
		<span></span>
	</div>
</div>
<div id="main">
<center><h1 style="color:#ccc;">FAQ</h1></center>
<center><h2 style="color:#ccc;">General</h2></center>
		<h3 id="1">How does this website works?</h3>
		<h4>I will give a quick example about how the system works:</h4>
		<h4>1) The advertiser deposits some Bitcoins</h4>
		<h4>2) The advertiser buys views (web traffic) for his website</h4>
		<h4>3) User sees that website during 60 seconds</h4>
		<h4>4) After 60 seconds user does the captcha and the Bitcoins gets credited into his account</h4>
		<h4>5) The user can withdraw his Bitcoins (only possible at 30th day of every month)</h4>
		<br>
		<h3 id="2">Is this site sustainable?</h3>
		<h4>Yes, because we receive a small fee from the purchases on this website</h4>
		<br>
		<h3 id="8">How can I contribute to the development of this website?</h3>
		<h4>You could make a donation. By donating, I will be able to buy a better hardware</h4>
		<h4>Bitcoin Address: 1PJa4M5WHFS2B1wzTEGmaFFajE2UANqT66</h4>
		<br>
		<center><h2 style="color:#ccc;">Users</h2></center>
	 <h3 id="3">What are the advantages of this website?</h3>
	 <h4>-> You only need to visit 7 websites in our website per day</h4>
     <h4>-> You can win up to 1 Bitcoin in a month</h4>
     <h4>-> Monthly withdraw (You can withdraw your bitcoins in the 30th day of every month in order to minimise lost of Bitcoin in fees</h4>
     <h4>-> Simple interface</h4>
     <h4>-> No subscriptions to win more (all users are treated equaly. Example: If the payment goes up, goes up to all the users)</h4>
	<br>
	 <h3 id="4">How can I win Bitcoins / How does this works?</h3>
	  <h4>Users can see until 7 websites per day. For each view users earn 0.0048 BTC</h4>
      <h4>To view the website, just go to Tasks. If there are any websites available to see, you will be able to watch them and earn BTC.</h4>
      <h4>To watch the websites (when available), you will click "Open Tasks" and a website rotator will open. You need to watch that website for 60</h4>
      <h4>seconds. After 60 seconds a Button will apear. After a small message apears in the top of the rotator ("< / script>") you can click it and do</h4>
      <h4>the captcha. The BTC is credited for each website you see.</h4>
	  <br>
	  <h3 id="5">Payments</h3>
	  <h4>Payments are made every 30th day of every month in order to minimise lost of Bitcoin in fees.</h4>
	  <h4>To withdraw your coins, go to Wallet -> Withdraw BTC</h4>
	  <h3>Warning: Do not click on Withdraw BTC if it isn't in the 30th day of the month. Otherwise, you will lose all your coins.</h3>
	  <br>
	  <h3 id="5">When I go to tasks it says that there are no tasks available. What does that mean?</h3>
	  <h4>It means that there are no ads bought by the advertisers. Because of that, there are no tasks available to do.</h4>
	  <br>
	  <h3>How can I deposit BTC?</h3>
	  <h4>The process is simple:</h4>
	  <h4>1 - Click on "Request Bitcoin Address" to get the address to send the bitcoin</h4>
	  <h4>2 - Save the code given (It will be necessary to get the bitcoins on your account)</h4>
	  <h4>3 - Send the desired ammount of bitcoins to the generated address</h4>
	  <h4>4 - Wait for the transaction to have 6 confirmations</h4>
	  <h4>5 - Click on "Claim deposit" to finish the deposit</h4>
	  <h4>6 - Enter the code and click on Claim</h4>
	  <h4>7 - Your Bitcoins have been credited on your account.</h4>
	  <h4>Atention: Be aware of the tax it can reduse the bitcoins that your account receives</h4>
	  <br>
	  <center><h2 style="color:#ccc;">Advertisers</h2></center>
	  <h3 id="6">What are the advantages for Advertisers?</h3>
		  <h4>-> Gain more trafic to your website.</h4>
		  <h4>-> Promote your website.</h4>
          <h4>-> Win money with ads displayed in your website (if you have)</h4>
          <h4>-> User can buy trafic using the bitcoins gained by viewing websites.</h4>
          <h4>-> Simple interface</h4>
          <h4>-> Buy the views that you want (from 1 to 60 views per buy)</h4>
          <h4>-> Costs only 0.0049 per view</h4>
	<br>
	<h3 id="7">How to buy Web Trafic (views)?</h3>
	<h4>Simply deposit the desired ammount of BTC (it must be higher or equal to 0.008477 BTC)</h4>
      <h4>After the transaction is confirmed (Minimum of 7 confirmations), simply click "Claim deposit" and put the code given with the address to get the deposit in your account.</h4>
      <h4>After that, go to My Account -> Buy website trafic and buy the trafic desired (each view costs 0.0049).</h4>
<br>	 
	 <h3>How can I deposit BTC?</h3>
	  <h4>The process is simple:</h4>
	  <h4>1 - Click on "Request Bitcoin Address" to get the address to send the bitcoin</h4>
	  <h4>2 - Save the code given (It will be necessary to get the bitcoins on your account)</h4>
	  <h4>3 - Send the desired ammount of bitcoins to the generated address</h4>
	  <h4>4 - Wait for the transaction to have 6 confirmations</h4>
	  <h4>5 - Click on "Claim deposit" to finish the deposit</h4>
	  <h4>6 - Enter the code and click on Claim</h4>
	  <h4>7 - Your Bitcoins have been credited on your account.</h4>
	  <h4>Atention: Be aware of the tax it can reduse the bitcoins that your account receives</h4>
</div>
</body>
</html>