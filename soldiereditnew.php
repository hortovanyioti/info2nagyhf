<?php
require('header.php');

if(isset($_POST['submit_add'],$_POST['name']))
{
	$_POST['name']=mysqli_real_escape_string($db,$_POST['name']);

	$query=sprintf("INSERT INTO soldier (name,byear) 
	VALUES ('%s','%s')",
	$_POST['name'],$_POST['byear']);

	mysqli_query($db, $query) or die(mysqli_error($db));
	$_SESSION['new_add']=true;
	header("Location: soldiers.php");
}

if(isset($_POST['submit_edit'],$_POST['name']))
{
	$_POST['name']=mysqli_real_escape_string($db,$_POST['name']);

	$query=sprintf("UPDATE soldier
	SET name='%s',	byear='%d'
	WHERE id='%d'",
	$_POST['name'],$_POST['byear'],$_POST['id']);

	mysqli_query($db, $query) or die(mysqli_error($db));
	$_SESSION['new_edit']=true;
	header("Location: soldiers.php");
}

$query = 'SELECT name AS class FROM class;';
$query = mysqli_query($db, $query) or die(mysqli_error($db));
?>

<?php echo '<h1 align="center">'.(isset($_POST['edit']) ? 'Editing': 'Adding').' soldier</h1>';  ?>

				
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
			Birth year:
		</th>
		<td>
			<input type="number" min="1900" max="<?= date("Y")?>" step="1" id="byear" name="byear" value=<?= isset($_POST['byear']) ? $_POST['byear'] : '' ?> >
		</td>
	</tr>
	<tr>
		<th>
			ode kéne még vmi Manufacture date:
		</th>
		<td>
			X
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