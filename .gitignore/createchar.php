<?php 
$pdo = new PDO('mysql:host=localhost;dbname=game_db', 'root', '');
?>
<!DOCTYPE html> 
<html> 
<head>

  <title>Create Character</title> 
</head> 
<body>
 
 <head>
<link rel="stylesheet" type="text/css" href="libs/css/style.css">
</head>

<body>

<div id="ganz">
<div id="headteil">
<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
 $error = false;
 $name = $_POST['name'];
 $class = $_POST['class'];
 $level = (1);
 $job = ('Apprentice Knightage');
 $Strength = ('1');
 $Health = ('1');
 $Intelligence = ('1');
 $Wisdom = ('1');
 $Agility = ('1');
 $SP = ('5');
 
 //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
 if(!$error) { 
 $statement = $pdo->prepare("SELECT * FROM player WHERE name = :name");
 $result = $statement->execute(array('name' => $name));
 $user = $statement->fetch();
 
 if($user !== false) {
 echo 'Dieser Name ist vergeben!<br>';
 $error = true;
 } 
 }
 
 //Keine Fehler, wir können den Nutzer registrieren
 if(!$error) { 

 
 $statement = $pdo->prepare("INSERT INTO player (name, class, level, Strength, Health, Intelligence, Wisdom, Agility, SP) VALUES (:name, :class, :level, :Strength, :Health, :Intelligence, :Wisdom, :Agility, :SP)");
 $result = $statement->execute(array('name' => $name, 'class' => $class, 'level' => $level,  'Strength' => $Strength, 'Health' => $Health, 'Intelligence' => $Intelligence, 'Wisdom' => $Wisdom, 'Agility' => $Agility, 'SP' => $SP));

 
 if($result) { 
 echo 'Character wurde Erstellt. <a href="geheim.php">zurück zum Spiel</a>';
 $showFormular = false;
 } else {
 echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
 }
 } 
}
 
if($showFormular) {
?>
 
<form action="?register=1" method="post">

Character Name:<br>
<input placeholder="charname" type="name" size="40" maxlength="250" name="name"><br><br>
 
Class:<br>
<input placeholder="Knight / Archer / Mage" type="class" size="40" maxlength="250" name="class"><br><br>

 
 
 
<input type="submit" value="Regist Account">
</form>
 
<?php
} //Ende von if($showFormular)
?>
 
</body>
</html>