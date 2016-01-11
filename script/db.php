<?php
$db=mysql_connect('localhost','root','') or die("Impossible to connect to db"); 
	mysql_select_db('txzone') or die("Database not Found"); //Conect to Database
	$websitename = "MyWebsite"; //Website Name
	$websiteURL = "http://mywebsite.whatever"; //Website URL
	$adsprice = "490000"; //Price of each add in Satoshi
	$dailyviewsforeachuser = ""; //Number of allowed ads to be seen by user before you reset tasks in the database
	$withdradenymessage = "Whithdraws are disabled"; //This is a custom message that displays when withdraws are disabled
	$ownerdebugemail = "example@example.com"; //With this you will receive an email for each buy that users do
		$ID1 = "";   //YOUR BLOCKCHAIN.INFO USER ID to Receive Payments
		$PW1 = ""; //User ID password
		
		$ID2 = "";   //YOUR BLOCKCHAIN.INFO USER ID to Send Payments
		$PW2 = ""; //User ID password
?>