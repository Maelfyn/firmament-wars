<?php
	require('values.php');
	require('connect1.php');
	
	
	$query = "select game from fwplayers where account=? and timestamp > date_sub(now(), interval {$_SESSION['lag']} second)";
	$stmt = $link->prepare($query);
	$stmt->bind_param('s', $_SESSION['account']);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($gameId);
	
	echo $stmt->num_rows;
	while ($stmt->fetch()){
		echo $gameId;
	}
	
	exit;
	$query = 'select count(row) from fwplayers where account=?';
	$stmt = $link->prepare($query);
	$stmt->bind_param('s', $_SESSION['account']);
	$stmt->execute();
	$stmt->bind_result($account);
	while ($stmt->fetch()){
		echo $account;
	}
	echo $account;
	if ($account){
		echo "Error";
	}
	exit();
	$_SESSION['production'] = 20;
	$_SESSION['turnBonus'] = 0;
	$_SESSION['manpower'] = 999;
	$gameDuration = microtime(true) - $_SESSION['gameDuration'];
	echo 'gameDuration: ' . $gameDuration . '<br>';
	$gameStartTime = 6 + ($_SESSION['resourceTick'] * 5);
	echo 'gameStartTime: ' . $gameStartTime . '<br>';
	
	$gameNow = (6 + $_SESSION['resourceTick'] * 5);
	echo 'gameNow: ' . $gameNow . '<br>';
	$gameStartTime = microtime(true) - $_SESSION['gameStartTime'];
	echo 'gameStartTime: ' . $gameStartTime . '<br>';
	
	if (isset($_SESSION['resourceTick'])){
		echo 'Resource Tick: ' . $_SESSION['resourceTick'] . '<br>';
		
		$gameDuration = microtime(true) - $_SESSION['gameStartTime'] + .5;
		echo 'gameDuration: ' . $gameDuration . '<br>';
		$tickDuration = $_SESSION['resourceTick'] * 5;
		echo 'tickDuration: ' . $tickDuration . '<br>';
	}
	
	// echo session
	if (isset($_SESSION['email'])){
		echo "email: " . $_SESSION['email'];
		echo "<br>account: " . $_SESSION['account'];
	}
	if (isset($_SESSION['max'])){
		echo "<br>gameId: " . $_SESSION['gameId'];
		echo "<br>max: " . $_SESSION['max'];
		echo "<br>gameName: " . $_SESSION['gameName'];
		echo "<br>startGame: " . $_SESSION['startGame'];
		echo "<br>gameType: " . $_SESSION['gameType'];
		echo "<br>player: " . $_SESSION['player'];
		echo "<br>map: " . $_SESSION['map'];
		echo "<br>food: " . $_SESSION['food'];
		echo "<br>foodMax: " . $_SESSION['foodMax'];
		echo "<br>foodMilestone: " . $_SESSION['foodMilestone'];
		echo "<br>production: " . $_SESSION['production'];
		echo "<br>culture: " . $_SESSION['culture'];
		echo "<br>cultureMax: " . $_SESSION['cultureMax'];
		echo "<br>cultureMilestone: " . $_SESSION['cultureMilestone'];
		echo "<br>manpower: " . $_SESSION['manpower'];
		if (isset($_SESSION['capital'])){
			echo "<br>capital: " . $_SESSION['capital'];
		}
		echo "<br>chatId: " . $_SESSION['chatId'];
		echo "<br>resourceTick: " . $_SESSION['resourceTick'];
		
		echo "<br>turnBonus: " . $_SESSION['turnBonus'];
		echo "<br>foodBonus: " . $_SESSION['foodBonus'];
		echo "<br>cultureBonus: " . $_SESSION['cultureBonus'];
		echo "<br>oBonus: " . $_SESSION['oBonus'];
		echo "<br>dBonus: " . $_SESSION['dBonus'];
		echo "<br>government: " . $_SESSION['government'];
	} else {
		echo '<br>Game values not detected in session.';
	}
	echo "<hr>";
	
	$start = microtime(true);
	
?>