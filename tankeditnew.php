<?php
include('header.php');

$query = 'SELECT class.name AS class FROM class;';
$query = mysqli_query($db, $query) or die(mysqli_error($db));
?>

<?php echo '<h1 align="center">'.(true ? 'Adding': 'Editing').' tank</h1>';  ?>

				
<form method="POST" action="index.php">
<table id="main-table">
	<tr>
		<th style="width: 50%">
			Name:
		</th>
		<td>
			<input required type="text" id="name" name="name" value=<?php isset($_POST['name']) ? $_POST['name'] : '' ?> >
		</td>
	</tr>
	<tr>
		<th>
			Class:
		</th>
		<td>
			<select id="class" name="class">
				<?php while ($row = mysqli_fetch_array($query)) : ?>

				<option><?= $row['class'] ?></option>

				<?php endwhile;?>
				 value=<?php isset($_POST['class']) ? $_POST['class'] : '' ?>>
			<select>
		</td>
	</tr>
	<tr>
		<th>
			Manufacture date:
		</th>
		<td>
			<input type="text" id="manufacture" name="manufacture" value=<?php isset($_POST['manufacture']) ? $_POST['manufacture'] : '' ?>>
		</td>
	</tr>
</table>

<div style="text-align: center; margin: 40px">
	<input class="large-button" type="submit" value="ADD"></input>
	<a class="large-button" href="index.php">CANCEL</a>
</div>

</form>


<?php include('footer.php'); ?>