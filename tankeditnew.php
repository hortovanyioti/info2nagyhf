<%- include ('header') -%>

<h1 align="center">

<% if (typeof tank === 'undefined') { %>
                    Adding
                <% }else{ %>
                    Modifying
                <% } %> tank</h1>
				
<form method="POST">
<table style="width: 50%" align="center" class="tabla_def">
	<tr>
		<td style="width: 45%" align="right" class="tabla_fejlec">Name:</td>
		<td>
			<input type="text" id="tipus" name="tipus"
                   value="<%= (typeof tank === 'undefined') ? '' : tank.tipus %>">
		</td>
	</tr>
	<tr>
		<td style="width: 45%" align="right" class="tabla_fejlec">
			Nationality:
		</td>
		<td>
			<input type="text" id="nation" name="nation"
                   value="<%= (typeof tank === 'undefined') ? '' : tank.nation %>">
		</td>
	</tr>
	<tr>
		<td style="width: 45%" align="right" class="tabla_fejlec">
			Era:
		</td>
		<td>
			<input type="text" id="era" name="era"
                   value="<%= (typeof tank === 'undefined') ? '' : tank.era %>">
		</td>
	</tr>
	<tr>
		<td style="width: 45%" align="right" class="tabla_fejlec">
			Crew number:
		</td>
		<td>
			<input type="text" id="crewnum" name="crewnum"
                   value="<%= (typeof tank === 'undefined') ? '' : tank.crewnum %>">
		</td>
	</tr>
</table>


	<a href="/tank/new">
		<input name="Button1" type="submit" value="Add" class="nagygomb" />
	</a>
	<a href="/"><input name="Button2" type="button" value="Cancel" class="nagygomb" /></a>
</form>
				&nbsp;

<%- include ('footer') -%>