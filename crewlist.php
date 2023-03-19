<%- include ('header') -%>
<h1 align="center" class="focim">Crew of <%=tank.tipus%></h1>

<p>
	<a href="<%=tank._id%>/new">
		<input name="addnew" type="button" value="Add" style="width: 180px" class="nagygomb" />
	</a>
</p>


<table style="width: 70%" align="center" class="tabla_def">
	<tr>
		<td style="width: 25%" class="tabla_fejlec">Name</td>
		<td style="width: 25%" class="tabla_fejlec">Position</td>
		<td style="width: 25%" class="tabla_fejlec">Rank</td>
		<td class="nagygomb">&nbsp;</td>
		<td class="nagygomb">&nbsp;</td>
	</tr>

	<% crews.forEach(function(egyCrewmb){ %>
		<% if(String( tank._id) == String(egyCrewmb._vehicle._id)){ %>
                    <tr>
                        <td class="tabla">
                            <%= egyCrewmb.name %>
                        </td>
                        <td class="tabla">
                            <%= egyCrewmb.pos %>
                        </td>
                        <td class="tabla">
                            <%= egyCrewmb.rank %>
                        </td>
						
						<td>
							<a href="/crewmb/<%= tank._id %>/edit/<%=egyCrewmb._id%>"><input name="Button7" align="center" type="button" value="Edit" /></a>
							&nbsp;
						</td>
						<td>
							<a href="/crewmb/<%= tank._id %>/del/<%=egyCrewmb._id%>"><input name="Button8" type="button" value="Delete" />
						</td>
                    </tr>
					<%}%>
                <% }); %>



</table>

<a href="/">
	<input name="back" type="button" value="Back" style="width: 180px" align="left" class="nagygomb" />
</a>

<%- include ('footer') -%>