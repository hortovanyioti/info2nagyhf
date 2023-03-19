<?php include('header.php') ?>

<h1 align="center">Tank database</h1>

<table id="main-table">
	<tr>
		<th style="width: 40%">Nation</th>
		<th style="width: 35%">Class</th>
		<th style="width: 25%">Manufactured</th>
	</tr>
	<tr>
		<td>Type</td>
		<td>Nation</td>
		<td>Manufactured</td>
	</tr>
	<tr>
		<td>Type</td>
		<td>Nation</td>
		<td>Manufactured</td>
	</tr>
	<tr>
		<td>Type</td>
		<td>Nation</td>
		<td>Manufactured</td>
	</tr>

	<tr>
		<?php /*tanks.forEach(function(egyTank){ 
                    <tr>
                        <td class="tabla">
                            <%= egyTank.tipus %>
                        </td>
                        <td class="tabla">
                            <%= egyTank.nation %>
                        </td>
                        <td class="tabla">
                            <%= egyTank.era %>
                        </td>
						<td class="tabla">
                            <a href="/crewmb/<%= egyTank._id %>"><input name="Button7" align="center" type="button" value="<%= egyTank.crewnum %>" /></a>
                        </td>

						<td>
							<a href="tank/edit/<%= egyTank._id %>"><input name="Button7" align="center" type="button" value="Edit" /></a>
							&nbsp;
						</td>
						<td>
							<a href="tank/del/<%= egyTank._id %>"><input name="Button8" type="button" value="Delete" />
						</td>
                    </tr>
                <% }); */ ?>
	</tr>
</table>
<div style="text-align: center; margin: 40px">
	<a class="add-button" href="tank/new">+ ADD NEW</a>

</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><?php echo hash('sha256','footer.php'); ?>

<?php include('footer.php') ?>