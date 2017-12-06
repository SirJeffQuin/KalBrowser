
<?php
//* Waelder und Berge erstellen*//
function createLand($val,$limit){
                     	$db = @new mysqli( 'localhost', 'root', '', 'game_db' );
                     	$a=0;
                     	$result=$db->query("SELECT id FROM map WHERE `status`=0 ORDER BY rand() LIMIT ".$limit);
                     	while($row=$result->fetch_row()){
                             	$rid=$row[0];
                             	$res=$db->query("UPDATE SET `status`='$val' WHERE `id`='$rid'" );
                             	$a++;
                     	}
                     	$result->close();
}

?>