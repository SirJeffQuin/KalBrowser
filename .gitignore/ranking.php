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
  
  $test = 'Ranglist';
  
 echo $test;           
            
  ?>          
            
</a></small></li>
					</ul>
				</div>
			</div>
			</div>
    
    
			
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





<div id="divlog">

<?php

$sql = "SELECT name, level, class, job, gname, gposition FROM `player` ORDER BY `level` DESC LIMIT 10";
$result = mysql_query($sql);
$i=0;
$lastscore = NULL;
while($row = mysql_fetch_array($result)) {
   if ($lastscore != $row['name']){
   $i++;
   }
   
      echo '<table class="ranking" width="600px" height="1">';
   	echo '<tr><td width="30px"><b><center><font color="black">Rank<br> '.$i.'</b></td><td width="130px"><b><center><font color="black">Name <br>'.$row['name'].'</b></td><td width="150px"><b><center><font color="black">Class <br>'.$row['class'].'</b></td><td width="1px"><b><center><font color="black">Job <br>'.$row['job'].'</b></td><td width="100px"><b><center><font color="black">Level <br>'.$row['level'].'</b></td><td width="160px"><b><center><font color="black">Guild<br> '.$row['gname'].'</b></td><br><td width="1px"><b><center><font color="black">Position<br> '.$row['gposition'].'</b></td></tr><tr></tr></th>';

   
   $lastscore = $row['level'];
   

}


?>

    




    
    
</div>

<style>
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
</style>

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










