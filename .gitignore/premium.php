<?php
include('libs/include/inc.php');
?>



<html>

<head>
<link rel="stylesheet" type="text/css" href="libs/css/style.css">
</head>

<body>
		<div id="top-layer">
			<div id="header-top">
				<div class="wrapper">
					<ul class="right">

					</ul>
					<ul class="load-responsive" rel="Top menu">
						<li><a>Server Date/Time: <small><?php
date_default_timezone_set("Europe/Berlin");
$timestamp = time();
?><?php
$datum = date("d.m.Y",$timestamp);
$uhrzeit = date("H:i",$timestamp);
echo $datum," - ",$uhrzeit," ";
?>
</a></li></small>
<li><a>User Online:<small><?php


$table="useronline";



$session = session_id();
$time = time();

$mysql = "SELECT * FROM $table WHERE session='$session'";

$result = mysql_query($mysql);


$count = mysql_num_rows($result);

if($count == NULL)
	mysql_query("INSERT INTO $table (session, time) VALUE ('$session','$time')");
else
	mysql_query("UPDATE $table SET time='$time' WHERE session = '$session'");

$count_user = mysql_query("SELECT * FROM $table");
$count_user = mysql_num_rows($count_user);

echo "<b>$count_user</b>";



mysql_query("DELETE FROM $table WHERE time < $time-10");



?>

</a></small></li>
<li><a>Viewing:<small>  
  <?php     
  
  $test = 'Premium Store';
  
 echo $test;           
            
  ?>          
            
</a></small></li>
					</ul>
				</div>
			</div>
			</div>
<meta name="viewport" content="width=device-width, initial-scale=1.0">  			
<div id="ganz">

<img id="imageheader" src="res/img/image-4.jpg" />


<ul>
  <li><a href="game.php" onclick="foo6() <?php if ($page == 'game.php') { echo ' class="active"'; } ?>" >Home</a></li>
  <li><a href="logout.php">  Logout</a> </li>
  <li> <a href="quest.php">Quests</a></li>
    <li> <a href="shop.php">Item Shop</a></li>
  <li> <a href="ranking.php">Ranking</a></li>
  <li> <a href="premium.php">Premium</a></li>


</ul>

<div id="maincontent">


<div class="columns">
  <ul class="price">
    <li class="header">Type 1</li>
    <li class="grey">€ 10</li>
    <p><br><br><br>
    Including:<br>
	30 Special [Golden] Shop Points<br><br>
        50 Special [Silver] Shop Points<br><br>
	Experience Stone 7 Days<br><br>
        Stone of Wealth 7 Days<br><br>
	Newcommer purchase reward - 
        Grade 35 +6 (upgraded) weapon for your Class (req. Level 1)<br><br>
	5000 Zamageon <br>
    </p>
    <li class="black"><a href="#">Donate Now!</a></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">Type 2</li>
    <li class="grey">€ 24.99</li>
    <p><br><br><br>
    Including:<br>
	150 Special [Golden] Shop Points<br><br>
        280 Special [Silver] Shop Points<br><br>
	Experience Stone 15 Days<br><br>
        Stone of Wealth 15 Days<br><br>
	Newcommer purchase reward - 
        Grade 35 +8 (upgraded) weapon for your Class (req. Level 1)<br><br>
	15000 Zamageon <br>
    </p>
    <li class="black"><a href="#">Donate Now!</a></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">Type 3</li>
    <li class="grey">€ 50</li>
    <p><br><br><br>
    Including:<br>
	400 Special [Golden] Shop Points<br><br>
        700 Special [Silver] Shop Points<br><br>
	Experience Stone 30 Days<br><br>
        Stone of Wealth 30 Days<br><br>
	Newcommer purchase reward - 
        Grade 35 +11 (upgraded) weapon for your Class (req. Level 1)<br><br>
	30000 Zamageon <br>
    </p>
    <li class="black"><a href="#">Donate Now!</a></li>
  </ul>
</div>





</div>
</div>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>

  
   function foo6 () {
      $.ajax({
        url:"/browser/libs/include/leveltable.php", //the page containing php script
        type: "POST", //request type

     });
 }
 </script>
 </div>
</body>

</html>










