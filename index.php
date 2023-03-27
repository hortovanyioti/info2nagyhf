<?php
include('lib.php');
include('header.php');
$db = openDB();

$query = 'CREATE OR REPLACE VIEW crewcount AS SELECT tankid, COUNT(DISTINCT(soldierid)) AS crew FROM tankcrew GROUP BY tankid;';	//megszámolja a tankhoz rendelt katonák számát
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'SELECT tank.name, tank.manufacture, class.name AS class, user.name AS owner, crewcount.crew FROM tank JOIN class ON tank.classid=class.id JOIN user ON tank.ownerid=user.id JOIN crewcount ON tank.id=crewcount.tankid;';
$query = mysqli_query($db, $query) or die(mysqli_error($db));
?>

<h1 align="center">Tank database</h1>

<table id="main-table">
	<tr>
		<th style="width: 25%">Name</th>
		<th style="width: 25%">Owner</th>
		<th style="width: 20%">Class</th>
		<th style="width: 15%">Crew</th>
		<th style="width: 15%">Manufactured</th>
	</tr>

	<?php while ($row = mysqli_fetch_array($query)) : ?>
		<tr>
			<td><?= $row['name'] ?></td>
			<td><?= $row['owner'] ?></td>
			<td><?= $row['class'] ?></td>
			<td><?= $row['crew'] ?></td>
			<td><?= $row['manufacture'] ?></td>
		</tr>
	<?php endwhile; closeDB($db); ?>

</table>

<div style="text-align: center; margin: 40px">
	<a class="add-button" href="tank/new">+ ADD NEW</a>

</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><?php echo hash('sha256', 'footer.php'); ?>

<?php include('footer.php') ?>