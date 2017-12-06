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
  
  $test = 'Quest Page';
  
 echo $test;           
            
  ?>          
            
</a></small></li>
					</ul>
				</div>
			</div>
			</div>
			
<div id="ganz">
<div id="divlog">
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

  <p id="imagequestmain1text">
Level 1 - 8
 <br>	
</p>


  <p id="imagequestmain2text">
Level 8 - 15
 <br>	
</p>


    <br>
    <div class="tooltip"><a href="quest1.php"><img src="res/img/10_1.jpg" alt="" /></a>  <span class="tooltiptext">Level 1 Quest</span></div>
    <div class="tooltip"><a href="quest2.php"><img src="res/img/17_1.jpg" alt="" /></a><span class="tooltiptext">Level 2 Quest</span></div>
    <div class="tooltip"><a href="quest1.php"><img src="res/img/19_1.jpg" alt="" /></a><span class="tooltiptext">Level 3 Quest</span></div>
    <div class="tooltip"><a href="quest1.php"><img src="res/img/23_1.jpg" alt="" /></a><span class="tooltiptext">Level 4 Quest</span></div>
    <div class="tooltip"><a href="quest1.php"><img src="res/img/26_1.jpg" alt="" /></a><span class="tooltiptext">Level 5 Quest</span></div>
    <div class="tooltip"><a href="quest1.php"><img src="res/img/26_11.jpg" alt="" /></a><span class="tooltiptext">Level 6 Quest</span></div>

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
<script>
var i = 0;
var txt = 'Lorem ipsum dummy text blabla.';
var speed = 50;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("demo").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}
</script>
 </div>
</body>

</html>





