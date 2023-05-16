<?php
require('header.php');

$query = 'SELECT soldier.id AS id, soldier.name AS name, byear, tank.name AS tank, tank.ownerid AS ownerid, quali.name AS quali
FROM soldier 
LEFT OUTER JOIN tankcrew ON soldier.id=soldierid 
LEFT OUTER JOIN tank ON tank.id=tankid 
LEFT OUTER JOIN quali ON quali.id=qualiid;';

$query = mysqli_query($db, $query) or die(mysqli_error($db));
?>

<h1 align="center">Soldiers</h1>

<form method="POST" action="">
	<div class="searchbar">
		<input type="text" name="searchTXT" placeholder="Search" <?= isset($_POST['searchTXT']) ? "value=".$_POST['searchTXT'] : '' ?>>
		<input class="small-button" type="submit" name="search" value="SEARCH">
	</div>
</form>

<table id="main-table" class="hide-button-bg">
	<tr>
		<th style="width: 30%">Name</th>
		<th style="width: 15%">Birth year</th>
		<th style="width: 25%">Vehicle</th>
		<th style="width: 20%">Qualification</th>
	</tr>

	<?php while ($row = mysqli_fetch_array($query)) : 
		if(isset($_POST['search'],$_POST['searchTXT']) && !Contains($row,$_POST['searchTXT'])) continue;?>
		<tr>
			<form method="POST">
				<td><?= $row['name'] ?></td>
				<td><?= $row['byear'] ?></td>		
				<td><?= $row['tank'] ?></td>
				<td><?= $row['quali'] ?></td>

				<td style="border: none">
					<input class="small-button" type="submit" formaction="soldiereditnew.php?id=<?= $row['id'] ?>" name="edit" value="EDIT" <?=in_array($row['ownerid'],array($_SESSION['id'],"")) || $_SESSION['id'] == 1 ? '' : 'style="display:none"'?>>
				</td>
				<td style="border: none">
					<input class="small-button" type="submit" formaction="soldierdelete.php?id=<?= $row['id'] ?>" name="delete" value="DELETE" <?=in_array($row['ownerid'],array($_SESSION['id'],"")) || $_SESSION['id'] == 1 ? '' : 'style="display:none"'?>>
				</td>

				<input type="hidden" name="id" value="<?= $row['id'] ?>">
				<input type="hidden" name="name" value="<?= $row['name'] ?>">
				<input type="hidden" name="byear" value="<?= $row['byear'] ?>">
				<input type="hidden" name="tank" value="<?= $row['tank'] ?>">
				<input type="hidden" name="quali" value="<?= $row['quali'] ?>">
			</form>
		</tr>
	<?php endwhile;?>

</table>

<div style="text-align: center; margin: 40px">
	<a class="large-button" href="soldiereditnew.php">+ ADD NEW</a>

</div>

<?php require('footer.php') ?>