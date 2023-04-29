<?php
require('header.php');

$query = 'CREATE OR REPLACE VIEW crewcount AS SELECT tankid, COUNT(DISTINCT(soldierid)) AS crew FROM tankcrew GROUP BY tankid;';	//megszámolja a tankhoz rendelt katonák számát
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'SELECT tank.id, tank.name, tank.manufacture, class.name AS class, user.name AS owner, COALESCE(crewcount.crew,0) AS crew FROM tank JOIN class ON tank.classid=class.id JOIN user ON tank.ownerid=user.id LEFT OUTER JOIN crewcount ON tank.id=crewcount.tankid;';
$query = mysqli_query($db, $query) or die(mysqli_error($db));
?>

<h1 align="center">Tank database</h1>

<form method="POST" action="">
	<div class="searchbar">
		<input type="text" name="searchTXT" placeholder="Search" <?= isset($_POST['searchTXT']) ? "value=".$_POST['searchTXT'] : '' ?>>
		<input class="small-button" type="submit" name="search" value="SEARCH">
	</div>
</form>

<table id="main-table" class="hide-button-bg">
	<tr>
		<th style="width: 25%">Name</th>
		<th style="width: 25%">Owner</th>
		<th style="width: 20%">Class</th>
		<th style="width: 15%">Crew</th>
		<th style="width: 15%">Manufactured</th>
	</tr>

	<?php while ($row = mysqli_fetch_array($query)) : 
			if(isset($_POST['search'],$_POST['searchTXT']) && !Contains($row,$_POST['searchTXT'])) continue;?>
			<tr>
				<form method="POST">
					<td><?= $row['name'] ?></td>
					<td><?= $row['owner'] ?></td>
					<td><?= $row['class'] ?></td>
					<td><?= $row['crew'] ?></td>
					<td><?= $row['manufacture'] ?></td>
					<td style="border: none">
						<input class="small-button" type="submit" formaction="tankeditnew.php?id=<?= $row['id'] ?>" name="edit" value="EDIT" <?=$_SESSION['username'] == 'admin' || $row['owner'] == $_SESSION['username'] ? '' : 'style="display:none"'?>>
					</td>
					<td style="border: none">
						<input class="small-button" type="submit" formaction="tankdelete.php?id=<?= $row['id'] ?>" name="delete" value="DELETE" <?=$_SESSION['username'] == 'admin' || $row['owner'] == $_SESSION['username'] ? '' : 'style="display:none"'?>>
					</td>

					<input type="hidden" name="id" value="<?= $row['id'] ?>">
					<input type="hidden" name="name" value="<?= $row['name'] ?>">
					<input type="hidden" name="class" value="<?= $row['class'] ?>">
					<input type="hidden" name="manufacture" value="<?= $row['manufacture'] ?>">
				</form>
			</tr>
	<?php endwhile;?>

</table>

<div style="text-align: center; margin: 40px">
	<a class="large-button" href="tankeditnew.php">+ ADD NEW</a>

</div>

<?php require('footer.php') ?>