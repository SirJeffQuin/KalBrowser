<?php
include ('libs/include/inc.php');
quest_done_l1();
quest_done_l2();
?>



<html>

<head>
<link rel="stylesheet" type="text/css" href="libs/css/style.css">
</head>
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
  
  $test = 'Quests Level 8 - 15';
  
 echo $test;           
            
  ?>          
            
</a></small></li>


					</ul>
				</div>
			</div>
			</div>
<body>

<div id="ganz">


<img id="imageheader" src="res/img/image-3.jpg" />

<div id="divlog">
 
<ul>
  <li><a href="game.php" onclick="foo6() <?php if ($page == 'game.php') { echo ' class="active"'; } ?>" >Home</a></li>
  <li><a href="logout.php">  Logout</a> </li>
  <li> <a href="quest.php">Quests</a></li>
    <li> <a href="shop.php">Item Shop</a></li>
  <li> <a href="ranking.php">Ranking</a></li>
  <li> <a href="premium.php">Premium</a></li>

</ul>
</div>
<div id="maincontentQuest">
<img id="imageqnpc" src="res/img/qnpc.png" /> </img>

<div id="container">
<img id="imageqnpcb" src="res/img/npcqb.png" /> </img>
<img id="imageqnpcb2" src="res/img/npcqb.png" /> </img>
  <p id="q1info">
    Quest:<br>
	Description : hunting demon vulgars<br>
	reqruit : Level 1<br>
	Hunting time : 5 minutes<br>
	Reward :1 ~ 3 Experience<br>
	Geons : 1 ~ 5 <br>
Quest 1 Completed : <?php echo ausgabe('questl1');?> <br>
<?php if(ausgabe('questl1_zeit')>0) { ?> Quest Time : <?php $rest =  ausgabe('questl1_zeit') - time(); echo $rest; ?> <?php } 
 { ?> 

	
</p>
<div id="buttonq1">
<form action="#" method="post">
<button name="geb" class="button button5" onclick="Quest()">Start Quest</button>
</form> <?php } ?>
 
  </div>
  
  
  
  
  <p id="q2info">
    Quest:<br>
	Description : hunting Suicide Bomber<br>
	reqruit : Level 3<br>
	Hunting time : 5 minutes<br>
	Reward : 16 ~ 32 Experience<br>
	Geons : 5 ~ 20 <br>
Quest 2 Completed : <?php echo ausgabe('questl2');?> <br>
<?php if(ausgabe('questl2_zeit')>0) { ?> Quest Time : <?php $rest =  ausgabe('questl2_zeit') - time(); echo $rest; ?> <?php } 
 { ?> 

	
</p>
<div id="buttonq2">
<form action="#" method="post">
<button name="geb2" class="button button5" onclick="Quest()">Start Quest</button>
</form> <?php } ?>
 
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





