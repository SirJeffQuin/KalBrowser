<?php
// Datenbank-Objekt erzeugen
$db = @new mysqli( 'localhost', 'root', '', 'game_db' );
// Variablen
$values = '';
$x=1;
$y=1;
$status=0;

// Datenbankverbindung hergestellt ?
if (mysqli_connect_errno() == 0){
 	while($x<101){
      	$y=1;
      	while($y<101){
           	$values .= '('.$x.','.$y.','.$status.'),';
           	$y++;
    	   }
       	$x++;
 	}
//Letztes Komma abschneiden
$values = substr($values, 0, -1);
$sql = 'INSERT INTO `map` (`x`, `y`, `status`) VALUES '.$values;
$eintrag = $db->prepare( $sql );
$eintrag->execute();
// Pruefen ob der Eintrag efolgreich war
	if ($eintrag->affected_rows == 1){
   	echo 'Die Eintr&auml;ge wurde hinzugef&uuml;gt.';
	} 
	else{
	echo 'Die Eintr&auml;ge konnten nicht hinzugef&uuml;gt werden.';
	}
} 
else{ 

echo ('dont meet reqcruitment to start the quest.');
} 
?>
