<?php
include('lib.php');
$db = openDB();
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
	header("location: login.php");
	exit;
 }

//$query = 'SELECT uitheme FROM user WHERE id='.$_SESSION["username"].';';
//mysqli_query($db, $query) or die(mysqli_error($db));
?>

<!DOCTYPE html>

<head>
	<title>Tank Database</title>
	<meta http-equiv="Content-Language" content="en" />
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<link rel="icon" type="image/x-icon" href="pics/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/layout.css" />
	<link rel="stylesheet" type="text/css" href="css/purple.css" />
</head>

<body>
	<div class="outline-bar">
		### Hortoványi Ottó INFO2 HF --- 2022/2023 ###
	</div>
	<div class="menubar">
		<a href="index.php" class="menubar-item">HOME</a>
		<a href="soldiers.php" class="menubar-item">SOLDIERS</a>
		<a href="" class="menubar-item">DARK</a>
		<a href="login.php" class="menubar-item">LOGIN</a>
	</div>