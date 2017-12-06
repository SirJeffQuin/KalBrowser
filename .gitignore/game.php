<?php
session_start();
if(!isset($_SESSION['userid'])) {
 die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
include('libs/include/inc.php');
$id = 1;
$g1id = 1;
$g2id = 2;
$g3id = 3;
$g4id = 4;
$g5id = 5;
$armorhelm = 22;
$armorchest = 23;
$armorgloves = 24;
$armorshorts = 25;
$armorboots = 26;
$ring1 = 27;
$lowhpmed = 33;
$lowhpmedamount = 33;

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

function armorhelm($var)
{
	global $armorhelm;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $armorhelm . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}


function armorchest($var)
{
	global $armorchest;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $armorchest . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}


function armorgloves($var)
{
	global $armorgloves;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $armorgloves . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}

function armorshorts($var)
{
	global $armorshorts;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $armorshorts . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}

function armorboots($var)
{
	global $armorboots;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $armorboots . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}

function lowhpmed($var)
{
	global $lowhpmed;
	$abfrage = mysql_query('SELECT ' . $var . ' FROM items WHERE id = ' . $lowhpmed . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}

function lowhpmedamount($var)
{
	global $lowhpmedamount;
	$abfrage = mysql_query('SELECT ' . $var . ' Amount FROM items WHERE id = ' . $lowhpmedamount . '');
	$row = mysql_fetch_object($abfrage);
	return $row->$var;
}

?>

<html>
<body>

    
 
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

if($count == NULL)
	mysql_query("INSERT INTO $table (session, time) VALUE ('$session','$time')");
else
	mysql_query("UPDATE $table SET time='$time' WHERE session = '$session'");

$count_user = mysql_query("SELECT * FROM $table");
$count_user = mysql_num_rows($count_user);

echo "<b>$count_user</b>";



mysql_query("DELETE FROM $table WHERE time < $time-10");


$page = basename($_SERVER['SCRIPT_NAME']);
?>

</a></small></li>

<li><a>Viewing:<small>  
  <?php     
  
  $test = 'Mainpage';
  
 echo $test;           
            
  ?>          
            
</a></small></li>

					</ul>
				</div>
			</div>
			</div>



<div id="ganz">
    
<div id="headteil"> 
<img id="imageheader" src="res/img/image-1.jpg"/>
<ul>
  <li><a href="game.php" onclick="upauto() <?php if ($page == 'game.php') { echo ' class="active"'; } ?>" >Home</a></li>
  <li><a href="logout.php">  Logout</a> </li>
  <li> <a href="quest.php">Quests</a></li>
    <li> <a href="shop.php">Item Shop</a></li>
  <li> <a href="ranking.php">Ranking</a></li>
  <li> <a href="premium.php">Premium</a></li>
<li> <a href="chat.php">Support(Chat)</a></li>
  <li id="div1" style="height: 45px; width: 80px; background-color: #424242; color: #fff"><a href="events.php">Events!</a></li>


</ul>
</div>

    

   
<div id="maincontent">
	


<div><?php	
	
	//Knight jobchange level 30	
     if(ausgabe  ('Class') == 'Knight')	if(ausgabe ('level') == '1')
	{
	global $id;
	mysql_query("UPDATE player SET Job = 'Wandering Knight' WHERE PID = $id");
	}
	
	 if(ausgabe  ('Class') == 'Knight') if(ausgabe ('level') == '30')	if(ausgabe ('Job') == 'Wandering Knight')	
	{
	global $id;
	mysql_query("UPDATE player SET Job = 'Apprentice Knight' WHERE PID = $id");
	}
	
	

	?>



<div id="container">
    
<p id="classchose"><?php if(ausgabe  ('class') == 'Knight')	 {echo '<img src="res/img/kimg.png">'; } ?> </p>
<p id="classchose"><?php if(ausgabe  ('class') == 'Archer')	 {echo '<img src="res/img/aimg.png">'; } ?> </p>
<p id="classchose"><?php if(ausgabe  ('class') == 'Mage')	 {echo '<img src="res/img/mimg.png">'; } ?> </p>
<p id="xpchose"class="tooltip"><?php if(ausgabe  ('XPStone') == '1')	 {echo '<img src="res/img/xpstone.bmp">'; } ?> <span class="tooltiptext">Experience Stone<br>Increase Experience from Quests by<br>100%<br>Increase Geon droprate by *2</span></p>
<p id="xpevent"class="tooltip"><?php if(eventcheck  ('expevent') == '1')	 {echo '<img src="res/img/buff389.bmp">'; } ?> <span class="tooltiptext">Experience Event<br>Increase Experience income by *2</span></p> 
<p id="dropevent"class="tooltip"><?php if(eventcheck  ('dropevent') == '1')	 {echo '<img src="res/img/shop005.bmp">'; } ?> <span class="tooltiptext">Drop Event<br>Increase Geon drops *2</span></p> 

<img id="image" src="res/img/charinfo.png"/> 
   
  <p id="classinfo-name">
    <?php echo ausgabe('name');?>
  </p>
  
    <p id="physatkmin"> 
    <?php if (g1sword('wear') == '0' and (g2sword('wear') =='0') and (g3sword('wear') =='0') and (g4sword('wear') =='0') and (g5sword('wear') =='0')) {echo ausgabe('physmin');?> ~ <?php echo ausgabe('physmax'); }
    else if (g1sword('wear') == '1') {echo ausgabe('physmin') + g1sword('physmin');?> ~ <?php echo ausgabe('physmax') + g1sword('physmax'); }
    else if (g2sword('wear') == '1') {echo ausgabe('physmin') + g2sword('physmin');?> ~ <?php echo ausgabe('physmax') + g2sword('physmax'); }
    else if (g3sword('wear') == '1') {echo ausgabe('physmin') + g3sword('physmin');?> ~ <?php echo ausgabe('physmax') + g3sword('physmax'); }
    else if (g4sword('wear') == '1') {echo ausgabe('physmin') + g4sword('physmin');?> ~ <?php echo ausgabe('physmax') + g4sword('physmax'); }    
    else if (g5sword('wear') == '1') {echo ausgabe('physmin') + g5sword('physmin');?> ~ <?php echo ausgabe('physmax') + g5sword('physmax'); }
    ?>
  </p>
  
      <p id="healthpoints">
      <?php if (g1sword('wear') == '0' and (g2sword('wear') =='0') and (g3sword('wear') =='0') and (g4sword('wear') =='0') and (g5sword('wear') =='0')) {echo ausgabe('leben');?> / <?php echo ausgabe('lebenmax'); }    
         else if (g1sword('wear') == '1') {echo ausgabe('leben') + g1sword('HP'); ?> / <?php echo ausgabe('lebenmax') + g1sword('HP'); }
         else if (g2sword('wear') == '1') {echo ausgabe('leben') + g2sword('HP'); ?> / <?php echo ausgabe('lebenmax') + g2sword('HP'); }
         else if (g3sword('wear') == '1') {echo ausgabe('leben') + g3sword('HP'); ?> / <?php echo ausgabe('lebenmax') + g3sword('HP'); }
         else if (g4sword('wear') == '1') {echo ausgabe('leben') + g4sword('HP'); ?> / <?php echo ausgabe('lebenmax') + g4sword('HP'); }
         else if (g5sword('wear') == '1') {echo ausgabe('leben') + g5sword('HP'); ?> / <?php echo ausgabe('lebenmax') + g5sword('HP'); }
         ?>
  </p>
  
       <p id="mana">
   <?php if (g1sword('wear') == '0' and (g2sword('wear') =='0') and (g3sword('wear') =='0') and (g4sword('wear') =='0') and (g5sword('wear') =='0')) {echo ausgabe('mana');}
         else if (g1sword('wear') == '1') {echo ausgabe('mana') + g1sword('MP'); }
         else if (g2sword('wear') == '1') {echo ausgabe('mana') + g2sword('MP'); }
         else if (g3sword('wear') == '1') {echo ausgabe('mana') + g3sword('MP'); }
         else if (g4sword('wear') == '1') {echo ausgabe('mana') + g4sword('MP'); }
         else if (g5sword('wear') == '1') {echo ausgabe('mana') + g5sword('MP'); }?>
       </p> 
  
         <p id="def">
   <?php if (g1sword('wear') == '0' and (g2sword('wear') =='0') and (g3sword('wear') =='0') and (g4sword('wear') =='0') and (g5sword('wear') =='0')) {echo ausgabe('def');}
         else if (g1sword('wear') == '1') {echo ausgabe('def'); }
         else if (g2sword('wear') == '1') {echo ausgabe('def'); }
         else if (g3sword('wear') == '1') {echo ausgabe('def'); }
         else if (g4sword('wear') == '1') {echo ausgabe('def'); }
         else if (g5sword('wear') == '1') {echo ausgabe('def'); }?>
         </p> 
  
           <p id="eva">
   <?php if (g1sword('wear') == '0' and (g2sword('wear') =='0') and (g3sword('wear') =='0') and (g4sword('wear') =='0') and (g5sword('wear') =='0')) {echo ausgabe('eva');}
   else if (g1sword('wear') == '1') {echo ausgabe('eva'); }
   else if (g2sword('wear') == '1') {echo ausgabe('eva'); }
   else if (g3sword('wear') == '1') {echo ausgabe('eva'); }
   else if (g4sword('wear') == '1') {echo ausgabe('eva'); }
   else if (g5sword('wear') == '1') {echo ausgabe('eva'); }?> 
           </p> 
  
    <p id="classinfo-class">
    <?php echo ausgabe('class');?>
  </p>
  
      <p id="classinfo-level">
    <?php echo ausgabe('level');?>
  </p>
  
        <p id="classinfo-job">
<?php echo ausgabe('job');?>
  </p>
  
          <p id="classinfo-exp">
<?php echo ausgabe('exp');?>
  </p>
  
  
          <p id="classinfo-kill">
<?php echo ausgabe('killed');?>
  </p>
  
  
          <p id="classstr">
Str: <?php if (g1sword('wear') == '0' and (g2sword('wear') =='0') and (g3sword('wear') =='0') and (g4sword('wear') =='0') and (g5sword('wear') =='0')) {echo ausgabe('Strength'); }
     else if (g1sword('wear') == '1') {echo ausgabe('Strength') + g1sword('Strength'); }
     else if (g2sword('wear') == '1') {echo ausgabe('Strength') + g2sword('Strength'); }
     else if (g3sword('wear') == '1') {echo ausgabe('Strength') + g3sword('Strength'); }
     else if (g4sword('wear') == '1') {echo ausgabe('Strength') + g4sword('Strength'); }
     else if (g5sword('wear') == '1') {echo ausgabe('Strength') + g5sword('Strength'); }?> 
          </p>
  
            <p id="classhth">
Hth: <?php if (g1sword('wear') == '0' and (g2sword('wear') =='0') and (g3sword('wear') =='0') and (g4sword('wear') =='0') and (g5sword('wear') =='0')) {echo ausgabe('Health');}
     else if (g1sword('wear') == '1') {echo ausgabe('Health') + g1sword('Health'); }
     else if (g2sword('wear') == '1') {echo ausgabe('Health') + g2sword('Health'); }
     else if (g3sword('wear') == '1') {echo ausgabe('Health') + g3sword('Health'); }  
     else if (g4sword('wear') == '1') {echo ausgabe('Health') + g4sword('Health'); }
     else if (g5sword('wear') == '1') {echo ausgabe('Health') + g5sword('Health'); }?> 
            </p>
  
              <p id="classint">
Int: <?php if (g1sword('wear') == '0' and (g2sword('wear') =='0') and (g3sword('wear') =='0') and (g4sword('wear') =='0') and (g5sword('wear') =='0')) {echo ausgabe('Intelligence');}
     else if (g1sword('wear') == '1') {echo ausgabe('Intelligence') + g1sword('Intelligence'); }
     else if (g2sword('wear') == '1') {echo ausgabe('Intelligence') + g2sword('Intelligence'); }
     else if (g3sword('wear') == '1') {echo ausgabe('Intelligence') + g3sword('Intelligence'); }  
     else if (g4sword('wear') == '1') {echo ausgabe('Intelligence') + g4sword('Intelligence'); } 
     else if (g5sword('wear') == '1') {echo ausgabe('Intelligence') + g5sword('Intelligence'); }?> 
              </p>
  
             <p id="classwis">
Wis: <?php if (g1sword('wear') == '0' and (g2sword('wear') =='0') and (g3sword('wear') =='0') and (g4sword('wear') =='0') and (g5sword('wear') =='0')) {echo ausgabe('Wisdom');}
     else if (g1sword('wear') == '1') {echo ausgabe('Wisdom') + g1sword('Wisdom'); }
     else if (g2sword('wear') == '1') {echo ausgabe('Wisdom') + g2sword('Wisdom'); }
     else if (g3sword('wear') == '1') {echo ausgabe('Wisdom') + g3sword('Wisdom'); } 
     else if (g4sword('wear') == '1') {echo ausgabe('Wisdom') + g4sword('Wisdom'); }
     else if (g5sword('wear') == '1') {echo ausgabe('Wisdom') + g5sword('Wisdom'); }?> 
             </p>
  
  
              <p id="classagi">
Agi: <?php if (g1sword('wear') == '0' and (g2sword('wear') =='0') and (g3sword('wear') =='0') and (g4sword('wear') =='0') and (g5sword('wear') =='0')) {echo ausgabe('Agility');}
     else if (g1sword('wear') == '1') {echo ausgabe('Agility') + g1sword('Agility'); }
     else if (g2sword('wear') == '1') {echo ausgabe('Agility') + g2sword('Agility'); }
     else if (g3sword('wear') == '1') {echo ausgabe('Agility') + g3sword('Agility'); }  
     else if (g4sword('wear') == '1') {echo ausgabe('Agility') + g4sword('Agility'); }
     else if (g5sword('wear') == '1') {echo ausgabe('Agility') + g5sword('Agility'); }?> 
              </p>
  
             <p id="classpoints">
Left: <?php echo ausgabe('SP');?>
  </p>
  
              <p id="guildname">
<?php echo ausgabe('gname');?>
  </p>
  
                <p id="guildposition">
<?php echo ausgabe('gposition');?>
  </p>

                 <p id="strbutton">
<a href="" onclick="strincrease()" >__</a>
  </p> 
  
                 <p id="hthbutton">
<a href="" onclick="hthincrease()" >__</a>
  </p> 
  
                 <p id="intbutton">
<a href="" onclick="intincrease()" >__</a>
  </p>   
  
                   <p id="wisbutton">
<a href="" onclick="wisincrease()" >__</a>
  </p>

                 <p id="agibutton">
<a href="" onclick="agiincrease()" >__</a>
  </p>   

  

  
  
  
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
 function strincrease () {
      $.ajax({
        url:"/browser/libs/include/statsscriptstr.php", //the page containing php script
        type: "POST", //request type

     });
 }
 
 function hthincrease () {
      $.ajax({
        url:"/browser/libs/include/statsscripthth.php", //the page containing php script
        type: "POST", //request type

     });
 }
 
  function intincrease () {
      $.ajax({
        url:"/browser/libs/include/statsscriptint.php", //the page containing php script
        type: "POST", //request type

     });
 }
 
   function wisincrease () {
      $.ajax({
        url:"/browser/libs/include/statsscriptwis.php", //the page containing php script
        type: "POST", //request type

     });
 }
 
   function agiincrease () {
      $.ajax({
        url:"/browser/libs/include/statsscriptagi.php", //the page containing php script
        type: "POST", //request type

     });
 }
 
  
   function upauto () {
      $.ajax({
        url:"/browser/libs/include/leveltable.php", //the page containing php script
        type: "POST", //request type

     });
 }

 
  </script>

      <div class="float3">
           <?php include 'inventar.php'?>
		   
    </div>
</div>
    
</div>
    
</div>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  $(function(){
    var intervalID;
    var freqSecs = 1.2;
    intervalID = setInterval (RepeatCall, freqSecs*1000 );

    function RepeatCall() {
      var inout = (freqSecs*2000)/2;
      $("#div1").fadeIn(inout).fadeOut(inout);
    }

    
  });

</script>



<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>
