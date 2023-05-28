<?php
require('header.php');

if(isset($_POST['submit_add'],$_POST['name']))
{
	$_POST['name']=mysqli_real_escape_string($db,$_POST['name']);

	$query=sprintf("INSERT INTO soldier (name,byear) 
	VALUES ('%s','%s');",
	$_POST['name'],$_POST['byear']);

	mysqli_query($db, $query) or die(mysqli_error($db));

	$query=sprintf("INSERT INTO tankcrew (soldierid,tankid,qualiid)
	VALUES ((SELECT id FROM soldier GROUP BY id DESC LIMIT 1),(SELECT id FROM tank WHERE name='%s'),(SELECT id FROM quali WHERE name='%s'));",
	$_POST['tank'],$_POST['quali']);

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
	
	//---
	
	if(!isset($_POST['tank'], $_POST['quali']) || $_POST['tank'] == "" || $_POST['quali'] == "")
	{
		$query=sprintf("DELETE FROM tankcrew WHERE soldierid='%d'", $_POST['id']);
		mysqli_query($db, $query) or die(mysqli_error($db));
	}
	else
	{
		$query=sprintf("UPDATE tankcrew
		SET tankid=(SELECT id FROM tank WHERE name='%s'), qualiid=(SELECT id FROM quali WHERE name='%s')
		WHERE soldierid='%d';",
		$_POST['tank'],$_POST['quali'],$_POST['id']);

		mysqli_query($db, $query) or die(mysqli_error($db));

		if(mysqli_num_rows(mysqli_query($db, "SELECT * FROM tankcrew WHERE soldierid={$_POST['id']};"))==0)	//ha nem létezett a kapcsolat
		{
			$query=sprintf("INSERT INTO tankcrew (soldierid,tankid,qualiid)
			VALUES (%d,(SELECT id FROM tank WHERE name='%s'),(SELECT id FROM quali WHERE name='%s'));",
			$_POST['id'],$_POST['tank'],$_POST['quali']);

			mysqli_query($db, $query) or die(mysqli_error($db));
		}
	}

	$_SESSION['new_edit']=true;
	header("Location: soldiers.php");
}

$query = 'SELECT name AS class FROM class;';
$query = mysqli_query($db, $query) or die(mysqli_error($db));

if($_SESSION['id']==1)
	$tank_query = "SELECT name AS tank, id AS tankid FROM tank;";
else
	$tank_query = "SELECT name AS tank, id AS tankid FROM tank WHERE ownerid={$_SESSION['id']};";

$tank_query = mysqli_query($db, $tank_query) or die(mysqli_error($db));

$quali_query = 'SELECT name AS quali, id AS qualiid FROM quali';
$quali_query = mysqli_query($db, $quali_query) or die(mysqli_error($db));
?>

<?php echo '<h1 align="center">'.(isset($_POST['edit']) ? 'Editing': 'Adding').' soldier</h1>';  ?>

				
<form method="POST" action="">
<table id="main-table">
	<tr>
		<td style="width: 50%">
			Name:
		</td>
		<td>
			<input required type="text" id="name" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" >
		</td>
	</tr>
	<tr>
		<td>
			Birth year:
		</td>
		<td>
			<input type="number" min="1900" max="<?= date("Y")?>" step="1" id="byear" name="byear" value=<?= isset($_POST['byear']) ? $_POST['byear'] : '' ?> >
		</td>
	</tr>
	<tr>
		<td>
			Vehicle:
		</td>
		<td>
			<select id="tank" name="tank">
				<option></option>
				<?php while ($row = mysqli_fetch_array($tank_query)) : ?>

				<option <?php if(isset($_POST['tank']) && $row['tank'] == $_POST['tank']) echo 'selected="selected"' ?>>
					<?= $row['tank'] ?>
				</option>

				<?php endwhile;?>
			<select>
		</td>
	</tr>
	<tr>
		<td>
			Qualification:
		</td>
		<td>
			<select id="quali" name="quali">
				<option></option>
				<?php while ($row = mysqli_fetch_array($quali_query)) : ?>

				<option <?php if(isset($_POST['quali']) && $row['quali'] == $_POST['quali']) echo 'selected="selected"' ?>>
					<?= $row['quali'] ?>
				</option>

				<?php endwhile;?>
			<select>
		</td>
	</tr>
</table>

<div style="text-align: center; margin: 40px">
	<input class="large-button" type="submit" name=<?= isset($_POST['edit']) ? 'submit_edit': 'submit_add' ?> value=<?= isset($_POST['edit']) ? 'SAVE': 'ADD' ?>>
	<a class="large-button" href="soldiers.php">CANCEL</a>
</div>

<input type="hidden" name="id" value=<?= isset($_POST['id']) ? $_POST['id'] : '' ?>>
</form>

<?php require('footer.php'); ?>