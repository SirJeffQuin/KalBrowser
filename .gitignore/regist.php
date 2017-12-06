<?php 
session_start();



$pdo = new PDO('mysql:host=localhost;dbname=game_db', 'root', '');
?>
<!DOCTYPE html> 
<html> 
<head>

  <title>Registrierung</title> 
</head> 
<body>
 
 <head>
<link rel="stylesheet" type="text/css" href="libs/css/style.css">
</head>

<body>

<div id="ganz">
<div id="headteil"> 
<img id="imageheader" src="res/img/headback.png" />
</div>
<div id="haupt">
<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
 $error = false;
 $accname = $_POST['accname'];
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 $passwort2 = $_POST['passwort2'];
 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 echo 'please insert a valid email-adress<br>';
 $error = true;
 } 
 if(strlen($passwort) == 0) {
 echo 'please insert a password<br>';
 $error = true;
 }
 if($passwort != $passwort2) {
 echo 'password have to be the same<br>';
 $error = true;
 }
 
  if(!filter_var($accname)) {
 echo 'Account name has ben taken already!<br>';
 $error = true;
 }
 
 //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
 if(!$error) { 
 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();
 
 if($user !== false) {
 echo 'This email-adress taken already!<br>';
 $error = true;
 } 
 }
 
  if(!$error) { 
 $statement = $pdo->prepare("SELECT * FROM users WHERE accname = :accname");
 $result = $statement->execute(array('accname' => $accname));
 $user = $statement->fetch();
 
 if($user !== false) {
 echo 'Account name has ben taken already!<br>';
 $error = true;
 } 
 }
 
 
 //Keine Fehler, wir können den Nutzer registrieren
 if(!$error) { 
 $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
 
 $statement = $pdo->prepare("INSERT INTO users (accname, email, passwort) VALUES (:accname, :email, :passwort)");
 $result = $statement->execute(array('accname' => $accname, 'email' => $email, 'passwort' => $passwort_hash));
 
 if($result) { 
 echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
 $showFormular = false;
 } else {
 echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
 }
 } 
}
 
if($showFormular) {
?>
 
 
 
 
 
 
 
 <div id="divlog">
<form action="?register=1" method="post">

<label for="email">Account Name:</label>
<input placeholder="youraccountname" type="text" size="40" maxlength="250" name="accname"><br><br>
 
<label for="email">Email Adress:</label>
<input placeholder="your@email.com" type="text" size="40" maxlength="250" name="email"><br><br>
 
<label for="email">Password:</label>
<input placeholder="e.G asd93js" type="text" size="40"  maxlength="250" name="passwort"><br><br>
 
<label for="email">repeat Password:</label>
<input  type="text" size="40" maxlength="250" name="passwort2"><br><br>
<input type="submit" value="Regist Account">
</form>
 </div>
<?php
} //Ende von if($showFormular)
?>
 
</body>
</html>