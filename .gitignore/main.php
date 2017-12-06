<?php

$pdo = new PDO('mysql:host=localhost;dbname=game_db', 'root', '');

$sql = "SELECT accID, accname, password, email FROM account";
foreach ($pdo->query($sql) as $row) {
   echo "AccountIndex : ".$row ['accID']." <br/> Accountname : ".$row['accname']."<br />";
   echo "password : ".$row['password']."<br />";
   echo "Email : ".$row['email']."<br/>";
}

?>