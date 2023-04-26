<?php
require('header.php');

if(isset($_POST['submit_add'],$_POST['name']))
{
	$_POST['name']=mysqli_real_escape_string($db,$_POST['name']);

	$query=sprintf("INSERT INTO tank (ownerid,name,classid,manufacture) 
	VALUES ((SELECT id FROM user WHERE name='%s'),'%s',(SELECT id FROM class WHERE name='%s'),'%s')",
	$_SESSION['username'],$_POST['name'],$_POST['class'],$_POST['manufacture']);

	mysqli_query($db, $query) or die(mysqli_error($db));
	$_SESSION['new_add']=true;
	header("Location: index.php");
}

if(isset($_POST['submit_edit'],$_POST['name']))
{
	$_POST['name']=mysqli_real_escape_string($db,$_POST['name']);

	$query=sprintf("UPDATE tank
	SET name='%s',classid=(SELECT id FROM class WHERE name='%s'),manufacture='%d'
	WHERE id='%d'",
	$_POST['name'],$_POST['class'],$_POST['manufacture'],$_POST['id']);

	mysqli_query($db, $query) or die(mysqli_error($db));
	$_SESSION['new_edit']=true;
	header("Location: index.php");
}

$query = 'SELECT name AS class FROM class;';
$query = mysqli_query($db, $query) or die(mysqli_error($db));
?>

<?php echo '<h1 align="center">'.(isset($_POST['edit']) ? 'Editing': 'Adding').' tank</h1>';  ?>

				
<form method="POST" action="">
<table id="main-table">
	<tr>
		<th style="width: 50%">
			Name:
		</th>
		<td>
			<input required type="text" id="name" name="name" value=<?= isset($_POST['name']) ? $_POST['name'] : '' ?> >
		</td>
	</tr>
	<tr>
		<th>
			Class:
		</th>
		<td>
			<select id="class" name="class">
				<?php while ($row = mysqli_fetch_array($query)) : ?>

				<option <?php if(isset($_POST['class']) && $row['class'] == $_POST['class']) echo 'selected="selected"' ?>>
					<?= $row['class'] ?>
				</option>

				<?php endwhile;?>
			<select>
		</td>
	</tr>
	<tr>
		<th>
			Manufacture date:
		</th>
		<td>
			<input type="number" min="1500" max="2500" step="1" id="manufacture" name="manufacture" value=<?= isset($_POST['manufacture']) ? $_POST['manufacture'] : '' ?>>
		</td>
	</tr>
</table>

<div style="text-align: center; margin: 40px">
	<input class="large-button" type="submit" name=<?= isset($_POST['edit']) ? 'submit_edit': 'submit_add' ?> value=<?= isset($_POST['edit']) ? 'SAVE': 'ADD' ?>>
	<a class="large-button" href="index.php">CANCEL</a>
</div>

<input type="hidden" name="id" value=<?= isset($_POST['id']) ? $_POST['id'] : '' ?>>
</form>


<?php require('footer.php'); ?>