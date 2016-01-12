# TXZone
Hello World,

          This is a new website Advertising project that enables users to win Bitcoins by seeing websites.

          Advantages for users:
         
          -> You only need to visit 7 websites in our website per day.
          -> You can win up to 1 Bitcoin in a month
          -> Monthly withdraw (You can withdraw your bitcoins in the 30th day of every month in order to minimise lost of Bitcoin in fees This month, all deposits/withdraws will be made by a human dued to blockchain api issues)
          -> Simple interface
          -> No subscriptions to win more (all users are treated equaly. Example: If the payment goes up, goes up to all the users)

          Advantages for Advertisers:

          -> Gain more trafic to your website.
          -> Win money with ads displayed in your website (if you have)
          -> User can buy trafic using the bitcoins gained by viewing websites.
          -> Simple interface
          -> Buy the views that you want (from 1 to 60 views per buy)
          -> Costs only 0.0049 per view

           And more is coming soon
 
          How does this works?

For Users:
      Users can see until 7 websites per day. For each view users earn 0.0048 BTC
      To view the website, just go to Tasks. If there are any websites available to see, you will be able to watch them and earn BTC.
      To watch the websites (when available), you will click "Open Tasks" and a website rotator will open. You need to watch that website for 60 
      seconds. After 60 seconds a Button will apear. After a small message apears in the top of the rotator ("</script>") you can click it and do  
      the captcha. The BTC is credited for each website you see.

For Advertisers:
      Simply deposit the desired ammount of BTC (it must be higher or equal to 0.008477 BTC)
      After the transaction is confirmed (Minimum of 7 confirmations), simply click "Claim deposit" and put the code given with the address to deposit.
      After that, go to My Account -> Buy website trafic and buy the trafic desired (each view costs 0.0049).

Example of how the website works:
 1º) The advertiser buys 1 view for his website
 2º) User sees that website during 60 seconds
 3º)After 60 seconds user does the captcha and gets paid
 

I am not responsible if you or someone loses Bitcoins, or if you get hacked dued to the lack of security or dued to another thing that happens.
This is a project in alpha. As an alpha project, you will experience bugs, lack of feactures, and many other things...
USE IT AT YOUR OWN RISK.


REQUIREMENTS
- Apache
- MySQL
- MSMTP
- PHP V5.5.13
- phpmyadmin
- 2 BlockChain Accounts

How to setup the website?
1> Setup Apache, MySQL, MSMTP, PHP
2> Create 2 Blockchain wallet accounts
3> Enable API in both of your Blockchain Wallets
4> Create a database on MySQL named txzone
5> Import the database.xml file to the database
6> Edit db.php in /scripts
7> Allow your website to acess the API of your wallets

How to reset Tasks Completed By the users (Must be done daily to enable user to make their tasks on the next day):
1> In phpmyadmin go to txzone -> tasks and delete all databa inside

How to enable Withdraws:
1> In phpmyadmin go to your txzone -> webcontrol And set the payment value from 0 to 1

If anything is missing please send an email to 0zenjb0@gmail.com

If you want to buy me a coffe please make a donation :)

Bitcoin Address : 1EWhnNyoLpMHvKNETyRCn95tDaJmsPjuSX


If you're using this for comercial purposes you need to donate 10% of the Monthly income to this address: 

Bitcoin Address : 1BLhtd8vea34j7s9evzNagGU1RFgZCmfK9

