<?php
session_start();
if(!isset($_SESSION['userid'])) {
 die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 

$g1id = 1;
$g2id = 2;
$g3id = 3;
$g4id = 4;
$g5id = 5;
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
include('libs/include/inc.php');

function g1sword($var)
{
	global $g1id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $g1id . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}

function g2sword($var)
{
	global $g2id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $g2id . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}


function g3sword($var)
{
	global $g3id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $g3id . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}

function g4sword($var)
{
	global $g4id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $g4id . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}


function g5sword($var)
{
	global $g5id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $g5id . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}
?>

<html>
<body>
<head>
<link rel="stylesheet" type="text/css" href="libs/css/style.css">
<link rel="stylesheet" type="text/css" href="libs/css/shop.css">

		<div id="top-layer">
			<div id="header-top">
				<div class="wrapper">
					<ul class="right">

					</ul>
					<ul class="load-responsive" rel="Top menu">
						<li><a>Server Date/Time: <small><?php
date_default_timezone_set("Europe/Berlin");
$timestamp = time();
?>
<?php
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

if ($count == NULL) {
    mysql_query("INSERT INTO $table (session, time) VALUE ('$session','$time')");
} else {
    mysql_query("UPDATE $table SET time='$time' WHERE session = '$session'");
}

/* @var $count_user type */
$count_user = mysql_query("SELECT * FROM $table");
$count_user = mysql_num_rows($count_user);

echo "<b>$count_user</b>";



mysql_query("DELETE FROM $table WHERE time < $time-10");



?>

</a></small></li>
<li><a>Viewing:<small>  
  <?php     
  
  $test = 'Item Shop';
  
 echo $test;           
            
  ?>          
            
</a></small></li>
					</ul>
				</div>
			</div>
			</div>





<div id="ganz">
<div id="headteil"> 
<img id="imageheader" src="res/img/image-3.jpg"/>
<ul>
  <li><a href="game.php" onclick="foo6() <?php if ($page == 'game.php') { echo ' class="active"'; } ?>" >Home</a></li>
  <li><a href="logout.php">  Logout</a> </li>
  <li> <a href="quest.php">Quests</a></li>
    <li> <a href="shop.php">Item Shop</a></li>
  <li> <a href="ranking.php">Ranking</a></li>
  <li> <a href="premium.php">Premium</a></li>



</ul>
</div>

<div id="maincontentinv">
	
	

<div>


	
<div id="container">
<p id="G1Sword"class="tooltip"><?php if(g1sword  ('name') == 'G1Sword')  {echo '<img src="res/img/wea/Wea001.bmp">'; } ?> <span class="tooltiptext">Short Iron Sword<br>Limitation: Knight Level 5<br>[ Grade 5 ]<br> Physical Attack 69 ~ 112<br> ITEM PRICE : 201 ZAMAGEON</span></p>
<p id="G2Sword"class="tooltip"><?php if(g2sword  ('name') == 'G2Sword')  {echo '<img src="res/img/wea/Wea006.bmp">'; } ?> <span class="tooltiptext">Iron Sword<br>Limitation: Knight Level 10<br>[ Grade 10 ]<br> Physical Attack 91 ~ 148<br>Strength + 1<br> Health + 1<br> Health Point + 50<br> ITEM PRICE : 518 ZAMAGEON</span></p>
<p id="G3Sword"class="tooltip"><?php if(g3sword  ('name') == 'G3Sword')  {echo '<img src="res/img/wea/Wea008.bmp">'; } ?> <span class="tooltiptext">Leaf Pattern Steel Sword<br>Limitation: Knight Level 16<br>[ Grade 16 ]<br> Physical Attack 141 ~ 210<br>Strength + 2<br> Health + 2<br> Wisdome + 1<br> Agility + 1<br> Health Point + 120<br> Magical Point + 30<br> ITEM PRICE : 1058 ZAMAGEON</span></p>
<p id="G4Sword"class="tooltip"><?php if(g4sword  ('name') == 'G4Sword')  {echo '<img src="res/img/wea/Wea042.bmp">'; } ?> <span class="tooltiptext">HwanDoo SaeHyung Sword<br>Limitation: Knight Level 21<br>[ Grade 21 ]<br> Physical Attack 156 ~ 229<br>Strength + 3<br> Health + 2 <br> Intelligence + 1<br> Wisdome + 1<br> Agility + 1<br> Health Point + 200<br> Magical Point + 50<br> ITEM PRICE : 1466 ZAMAGEON</span></p>
<p id="G5Sword"class="tooltip"><?php if(g5sword  ('name') == 'G5Sword')  {echo '<img src="res/img/wea/Wea107.bmp">'; } ?> <span class="tooltiptext">Black Treasure Sword<br>Limitation: Knight Level 25<br>[ Grade 25 ]<br> Physical Attack 177 ~ 241<br>Strength + 3<br> Health + 3 <br> Intelligence + 2<br> Wisdome + 2<br> Agility + 2<br> Health Point + 260<br> Magical Point + 80<br> ITEM PRICE : 2309 ZAMAGEON</span></p>


<p id="Geonsshop"class="tooltip">Geons : <?php echo ausgabe('geons') ?> <span class="tooltiptext">Current Zamageon</span></p>


  <img id="image" src="res/img/shop.bmp"/> 

  
                   <p id="Grade1Sw">
<a href="" onclick="g1sw()" >______</a>
  </p> 
  
   
                   <p id="Grade2Sw">
<a href="" onclick="g2sw()" >______</a>
  </p>  
  
                     <p id="Grade3Sw">
<a href="" onclick="g3sw()" >______</a>
  </p>  

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
 function g1sw () {
      $.ajax({
        url:"/browser/libs/include/buyg1s.php", //the page containing php script
        type: "POST", //request type

     });
 }
 
 
  function g2sw () {
      $.ajax({
        url:"/browser/libs/include/buyg2s.php", //the page containing php script
        type: "POST", //request type

     });
 }
  
 
  function g3sw () {
      $.ajax({
        url:"/browser/libs/include/buyg3s.php", //the page containing php script
        type: "POST", //request type

     });
 }
 </script>
  
</div>
</div>
</div>
</div>






</body>
</html>
</head>