<?php
$row = 2;
?>

<html>
<body>
<head>

<link rel="stylesheet" type="text/css" href="libs/css/inventar.css">


<div id="maincontentinv">
	
	

<div>


	
<div id="container">

<p id="lowhpmed"class="tooltip"><?php if(lowhpmed  ('name') == 'LowHealthMedicine') if(lowhpmed ('Amount') > '0')	 {echo '<img src="res/img/buffs/item002.bmp">'; } ?> <span class="tooltiptext">Low Health Medicine<br>Limitation: All Level 1<br>Increase Health Points by + 100<br>*0-20Wisdom ~100<br>*21-50Wisdom ~150<br>*-51+Wisdom ~200</span></p>

<p id="lowhpmedamount"class="tooltip"><?php if(lowhpmed ('Amount') > '0') echo lowhpmedamount('Amount') ?></p>

    
<p id="armorhelm"class="tooltip"><?php if(armorhelm  ('name') == 'SteelArmorHelmet') if(armorhelm  ('wear') == '1')	if(armorhelm ('have') == '1')	{echo '<img src="res/img/def/def002.bmp">'; } ?> <span class="tooltiptext">Steel Armor Helmet<br>Limitation: Knight Level 5<br>[ Grade 6 ]<br>Strength + 1<br> Health + 1<br> Wisdom +1<br> Agility +1<br> Health Points + 125<br> Mana Point + 25</span></p>

<p id="armorchest"class="tooltip"><?php if(armorchest  ('name') == 'SteelArmorChest') if(armorchest  ('wear') == '1')	if(armorchest ('have') == '1')	{echo '<img src="res/img/def/def006.bmp">'; } ?> <span class="tooltiptext">Steel Armor Chest<br>Limitation: Knight Level 5<br>[ Grade 6 ]<br>Strength + 1<br> Health + 1<br> Wisdom +1<br> Agility +1<br> Health Points + 125<br> Mana Point + 25</span></p>

<p id="armorgloves"class="tooltip"><?php if(armorgloves  ('name') == 'SteelArmorGloves') if(armorgloves  ('wear') == '1')	if(armorgloves ('have') == '1')	{echo '<img src="res/img/def/def003.bmp">'; } ?> <span class="tooltiptext">Steel Armor Gloves<br>Limitation: Knight Level 5<br>[ Grade 6 ]<br>Strength + 1<br> Health + 1<br> Wisdom +1<br> Agility +1<br> Health Points + 125<br> Mana Point + 25</span></p>

<p id="armorshorts"class="tooltip"><?php if(armorshorts  ('name') == 'SteelArmorShorts') if(armorshorts  ('wear') == '1')	if(armorshorts ('have') == '1')	{echo '<img src="res/img/def/def005.bmp">'; } ?> <span class="tooltiptext">Steel Armor Shorts<br>Limitation: Knight Level 5<br>[ Grade 6 ]<br>Strength + 1<br> Health + 1<br> Wisdom +1<br> Agility +1<br> Health Points + 125<br> Mana Point + 25</span></p>

<p id="armorboots"class="tooltip"><?php if(armorboots  ('name') == 'SteelArmorBoots') if(armorboots  ('wear') == '1')	if(armorboots ('have') == '1')	{echo '<img src="res/img/def/def004.bmp">'; } ?> <span class="tooltiptext">Steel Armor Boots<br>Limitation: Knight Level 5<br>[ Grade 6 ]<br>Strength + 1<br> Health + 1<br> Wisdom +1<br> Agility +1<br> Health Points + 125<br> Mana Point + 25</span></p>

<p id="invitem1wear"class="tooltip"><?php if(g1sword  ('name') == 'G1Sword') if(g1sword  ('wear') == '1')	if(g1sword ('have') == '1')	 {echo '<img src="res/img/wea/Wea001.bmp">'; } ?> <span class="tooltiptext">Short Iron Sword<br>Limitation: Knight Level 5<br>[ Grade 5 ]<br> Physical Attack 69 ~ 112</span></p>

<p id="invitem1wear"class="tooltip"><?php if(g2sword  ('name') == 'G2Sword') if(g2sword  ('wear') == '1')	if(g2sword ('have') == '1')	 {echo '<img src="res/img/wea/Wea006.bmp">'; } ?> <span class="tooltiptext">Iron Sword<br>Limitation: Knight Level 10<br>[ Grade 10 ]<br> Physical Attack 91 ~ 148<br>Strength + 1<br> Health + 1<br> Health Point + 50</span></p>

<p id="invitem1wear"class="tooltip"><?php if(g3sword  ('name') == 'G3Sword') if(g3sword  ('wear') == '1')	if(g3sword ('have') == '1')	 {echo '<img src="res/img/wea/Wea008.bmp">'; } ?> <span class="tooltiptext">Big Steel Sword<br>Limitation: Knight Level 16<br>[ Grade 18 ]<br> Physical Attack 141 ~ 210<br>Strength + 2<br> Health + 2<br> Wisdom +1<br> Agility +1<br> Health Points + 120<br> Mana Point + 30</span></p>




<p id="Geons"class="tooltip"><?php echo ausgabe('geons') ?> <span class="tooltiptext">Zamageon</span></p>


  <img id="image" src="res/img/inventar.png"/> 
  
  <p id="Knight"class="tooltip"><?php 	 {echo '<img src="res/img/icon/Knight.png">'; } ?> </p>
  <p id="Knightwea"class="tooltip"><?php if(g1sword  ('wear') == '1')	if(g1sword ('have') == '1')	 {echo '<img src="res/img/icon/knightwaffe1.png">'; } ?> </p>
  <p id="Knightwea2"class="tooltip"><?php if(g3sword  ('wear') == '1')	if(g3sword ('have') == '1')	 {echo '<img src="res/img/icon/knightwaffe2.png">'; } ?> </p>
  <p id="Knightchest1"class="tooltip"><?php 	 {echo '<img src="res/img/icon/knightchest1.png">'; } ?> </p>
  <p id="Knighthelm1"class="tooltip"><?php 	 {echo '<img src="res/img/icon/knighthelm1.png">'; } ?> </p>

  
                   <p id="wearon1">
<a href="" onclick="hpmeduselow()" >______</a>
  </p> 
  
   
                   <p id="wearoff1">
<a href="" onclick="foo1()" >______</a>
  </p>  

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
 function hpmeduselow () {
      $.ajax({
        url:"/browser/libs/include/lebengen.php", //the page containing php script
        type: "POST", //request type

     });
 }
 
 
  function foo1 () {
      $.ajax({
        url:"/browser/libs/include/weaponoff1.php", //the page containing php script
        type: "POST", //request type

     });
 }
 </script>
  
</div>
</div>
</div>







</body>
</html>

</head>
