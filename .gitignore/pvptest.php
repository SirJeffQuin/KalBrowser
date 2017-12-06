<html>
<head>
	<title>Index Page</title>
</head>
<body>
	<p>Hello, {$name}!</p>
	<ul>
		<li>Attack: <strong>{$attack}</strong></li>
		<li>Defence: <strong>{$defence}</strong></li>
		<li>Magic: <strong>{$magic}</strong></li>
		<li>Gold in hand: <strong>{$gold}</strong></li>
		<li>Current HP: <strong>{$currentHP}/{$maximumHP}</strong>
	</ul>
	<p><a href='logout.php'>Logout</a></p>
	<p><a href='forest.php'>The Forest</a></p>
</body>
</html>



<?php
 $smarty->assign('currentHP',getStat('curhp',$userID));
$smarty->assign('maximumHP',getStat('maxhp',$userID));

function getMonsterStat($statName,$monsterID) {
	include 'config.php';
	$conn = mysql_connect($dbhost,$dbuser,$dbpass)
		or die ('Error connecting to mysql:');
	mysql_select_db($dbname);
	createMonsterStatIfNotExists($statName,$monsterID);
	$query = sprintf("SELECT value FROM monster_stats WHERE stat_id = (SELECT id FROM stats WHERE display_name = '%s' OR short_name = '%s') AND monster_id = '%s'",
		mysql_real_escape_string($statName),
		mysql_real_escape_string($statName),
		mysql_real_escape_string($monsterID));
	$result = mysql_query($query);
	list($value) = mysql_fetch_row($result);
	return $value;		
}
 
function createMonsterStatIfNotExists($statName,$monsterID) {
	include 'config.php';
	$conn = mysql_connect($dbhost,$dbuser,$dbpass)
		or die ('Error connecting to mysql:');
	mysql_select_db($dbname);
	$query = sprintf("SELECT count(value) FROM monster_stats WHERE stat_id = (SELECT id FROM stats WHERE display_name = '%s' OR short_name = '%s') AND monster_id = '%s'",
		mysql_real_escape_string($statName),
		mysql_real_escape_string($statName),
		mysql_real_escape_string($monsterID));
	$result = mysql_query($query);
	list($count) = mysql_fetch_row($result);
	if($count == 0) {
		// the stat doesn't exist; insert it into the database
		$query = sprintf("INSERT INTO monster_stats(stat_id,monster_id,value) VALUES ((SELECT id FROM stats WHERE display_name = '%s' OR short_name = '%s'),'%s','%s')",
		mysql_real_escape_string($statName),
		mysql_real_escape_string($statName),
		mysql_real_escape_string($monsterID),
		'0');
		mysql_query($query);
	}	
}
 
?>

<?php
		require_once 'stats.php';			// player stats
		require_once 'monster-stats.php';	// monster stats
		// to begin with, we'll retrieve our player and our monster stats 
		$query = sprintf("SELECT id FROM users WHERE UPPER(username) = UPPER('%s')",
					mysql_real_escape_string($_SESSION['username']));
		$result = mysql_query($query);
		list($userID) = mysql_fetch_row($result);
		$player = array (
			name		=>	$_SESSION['username'],
			attack 		=>	getStat('atk',$userID),
			defence		=>	getStat('def',$userID),
			curhp		=>	getStat('curhp',$userID)
		);
		$query = sprintf("SELECT id FROM monsters WHERE name = '%s'",
					mysql_real_escape_string($_POST['monster']));
		$result = mysql_query($query);
		list($monsterID) = mysql_fetch_row($result);
		$monster = array (
			name		=>	$_POST['monster'],
			attack		=>	getMonsterStat('atk',$monsterID),
			defence		=>	getMonsterStat('def',$monsterID),
			curhp		=>	getMonsterStat('maxhp',$monsterID)
		);
$combat = array();
		$turns = 0;		
		while($player['curhp'] > 0 && $monster['curhp'] > 0) {
			if($turns % 2 != 0) {
				$attacker = &$monster;
				$defender = &$player;	
			} else {
				$attacker = &$player;
				$defender = &$monster;
			}
			$damage = 0;
			if($attacker['attack'] > $defender['defence']) {
				$damage = $attacker['attack'] - $defender['defence'];	
			}
			$defender['curhp'] -= $damage;
			$combat[$turns] = array(
				attacker	=>	$attacker['name'],
				defender	=>	$defender['name'],
				damage		=>	$damage
			);
			$turns++;
		}
		setStat('curhp',$userID,$player['curhp']);
		if($player['curhp'] > 0) {
			// player won
			setStat('gc',$userID,getStat('gc',$userID)+getMonsterStat('gc',$monsterID));	
			$smarty->assign('won',1);
			$smarty->assign('gold',getMonsterStat('gc',$monsterID));
		} else {
			// monster won
			$smarty->assign('lost',1);	
		}
		$smarty->assign('combat',$combat);
?> </p>