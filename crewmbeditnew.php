<%- include ('header') -%>

<h1 align="center">

<% if (typeof crew === 'undefined') { %>
                    Adding crewmember to <%=tank.tipus%>
                <% }else{ %>
                    Modifying crewmember of <%=tank.tipus%>
                <% } %> </h1>
				
<form method="POST">
<table style="width: 50%" align="center" class="tabla_def">
	<tr>
		<td style="width: 45%" align="right" class="tabla_fejlec">Name:</td>
		<td>
			<input type="text" id="name" name="name"
                   value="<%= (typeof crew === 'undefined') ? '' : crew.name %>">
		</td>
	</tr>
	<tr>
		<td style="width: 45%" align="right" class="tabla_fejlec">
			Position:
		</td>
		<td>
			<input type="text" id="pos" name="pos"
                   value="<%= (typeof crew === 'undefined') ? '' : crew.pos %>">
		</td>
	</tr>
	<tr>
		<td style="width: 45%" align="right" class="tabla_fejlec">
			Rank:
		</td>
		<td>
			<input type="text" id="rank" name="rank"
                   value="<%= (typeof crew === 'undefined') ? '' : crew.rank %>">
		</td>
	</tr>
</table>


	<a href="../">
		<input name="Button1" type="submit" value="Add" class="nagygomb" />
	</a>
	<a href="/crewmb/<%=tank._id%>"><input name="Button2" type="button" value="Cancel" class="nagygomb" /></a>
</form>
				&nbsp;

<%- include ('footer') -%>