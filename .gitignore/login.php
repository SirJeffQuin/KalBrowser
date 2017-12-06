<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=game_db', 'root', '');
 
if(isset($_GET['login'])) {
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 
 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();
 
 //Überprüfung des Passworts
 if ($user !== false && password_verify($passwort, $user['passwort'])) {
 $_SESSION['userid'] = $user['id'];
 die('Login successfully. <meta http-equiv="refresh" content="1; URL=game.php">
<meta name="keywords" content="automatic redirection">');
 
 } else {
 $errorMessage = "E-Mail oder Passwort war ungültig<br>";
 }
 

 
}
?>




<!DOCTYPE html> 
<html> 
<head>
<div id="ganz">
<div id="headteil"> 
<img id="imageheader" src="res/img/headback.png" />
</div>
</head> 
<body>

<link rel="stylesheet" type="text/css" href="libs/css/style.css">


<body>

<div id="Navigation">

</div>
<?php 
if(isset($errorMessage)) {
 echo $errorMessage;
}
?>
 
 <div id="divlog">
<form action="?login=1" method="post">

    <label for="email">Email Adress:</label>
	<input type="text" id="email" name="email" placeholder="Your emailadress..">
 
    <label for="passwort">Password:</label>
    <input type="text" id="passwort" name="passwort" placeholder="Your password..">
    <input type="submit" value="Login">
</form>
</div>

 

</body>
</html>