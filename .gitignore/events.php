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
  
  $test = 'Events';
  
 echo $test;           
            
  ?>          
            
</a></small></li>
					</ul>
				</div>
			</div>
			</div>
<div id="ganz">
<div id="divlog">
<img id="imageheader" src="res/img/image-2.jpg" />

<ul>
  <li><a href="game.php" onclick="foo6() <?php if ($page == 'game.php') { echo ' class="active"'; } ?>" >Home</a></li>
  <li><a href="logout.php">  Logout</a> </li>
  <li> <a href="quest.php">Quests</a></li>
    <li> <a href="shop.php">Item Shop</a></li>
  <li> <a href="ranking.php">Ranking</a></li>
  <li> <a href="premium.php">Premium</a></li>


</ul>

<div id="maincontent">

<h3> 
    <?php
    error_reporting(0);
    function eventcheckon($var)
{
	global $id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM events WHERE expevent = 1');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}

    
    function eventcheckoff($var)
{
	global $id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM events WHERE expevent = 0');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}
    
    if(eventcheckon('expevent')==1)
	{
          echo 'Experience event is running!';
	}
 else 
         if(eventcheckoff('expevent')==0)
	{
          echo 'Experience event is not running!';
	}

?>
</h3>

<h3> 
    <?php
    error_reporting(0);
    function eventcheckon1($var)
{
	global $id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM events WHERE dmgevent = 1');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}

    
    function eventcheckoff1($var)
{
	global $id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM events WHERE dmgevent = 0');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}
    
    if(eventcheckon1('dmgevent')==1)
	{
          echo 'Damage event is running!';
	}
 else 
         if(eventcheckoff1('dmgevent')==0)
	{
          echo 'Damage event is not running!';
	}

?>
</h3>

<h3> 
    <?php
    error_reporting(0);
    function eventcheckon2($var)
{
	global $id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM events WHERE dropevent = 1');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}

    
    function eventcheckoff2($var)
{
	global $id;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM events WHERE dropevent = 0');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}
    
    if(eventcheckon1('dropevent')==1)
	{
          echo 'Drop event is running!';
	}
 else 
         if(eventcheckoff1('dropevent')==0)
	{
          echo 'Drop event is not running!';
	}

?>
    
</div>
</div>

</div>



</body>

</html>

