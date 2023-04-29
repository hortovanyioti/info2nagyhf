<?php
require('lib.php');
$db = openDB();
session_start();

if ((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) && str_contains($_SERVER['REQUEST_URI'],'login.php') == false ){
	header("location: login.php");
}

if(isset($_POST['uitheme'])){
	$_SESSION['uitheme']=$_POST['uitheme'];

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

		$query = sprintf("UPDATE user
		SET uitheme='%s'
		WHERE id='%d'",
		$_SESSION['uitheme'],$_SESSION['id']);

		mysqli_query($db,$query) or die(mysqli_error($db));
	}
}

if(!isset($_SESSION['uitheme'])){
	$_SESSION['uitheme'] = 'purple';
}
?>

<!DOCTYPE html>

<head>
	<title>Tank Database</title>
	<meta http-equiv="Content-Language" content="en" />
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<link rel="icon" type="image/x-icon" href="pics/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/layout.css" />
	<link rel="stylesheet" type="text/css" href=<?="css/uitheme/".$_SESSION['uitheme'].".css" ?> />
</head>

<body>
	<div class="outline-bar">
		### Hortoványi Ottó INFO2 HF --- 2022/2023 ###
	</div>
	<form method="POST" action="">
		<div class="menubar">
			<a href="index.php" class="menubar-item">HOME</a>
			<a href="soldiers.php" class="menubar-item">SOLDIERS</a>
			
			<select id="uitheme" name="uitheme" onchange="this.form.submit()">
				<?php ListThemes();?>
			<select>
			
			<a href="login.php" class="menubar-item"><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'LOGIN' ?></a>
		</div>
	</form>