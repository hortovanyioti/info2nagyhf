<?php
require('header.php');

$query = 'SELECT id, name, byear FROM soldier;';
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
		<th style="width: 40%">Name</th>
		<th style="width: 40%">Birth year</th>
	</tr>

	<?php while ($row = mysqli_fetch_array($query)) : 
		if(isset($_POST['search'],$_POST['searchTXT']) && !Contains($row,$_POST['searchTXT'])) continue;?>
		<tr>
			<form method="POST">
				<td><?= $row['name'] ?></td>
				<td><?= $row['byear'] ?></td>

				<td style="border: none"><input class="small-button" type="submit" formaction="soldiereditnew.php?id=<?= $row['id'] ?>" name="edit" value="EDIT"></td>
				<td style="border: none"><input class="small-button" type="submit" formaction="soldierdelete.php?id=<?= $row['id'] ?>" name="delete" value="DELETE"></td>

				<input type="hidden" name="id" value="<?= $row['id'] ?>">
				<input type="hidden" name="name" value="<?= $row['name'] ?>">
				<input type="hidden" name="byear" value="<?= $row['byear'] ?>">
			</form>
		</tr>
	<?php endwhile;?>

</table>

<div style="text-align: center; margin: 40px">
	<a class="large-button" href="soldiereditnew.php">+ ADD NEW</a>

</div>

<?php require('footer.php') ?>