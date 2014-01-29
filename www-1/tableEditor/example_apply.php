<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.pack.js"></script>
<script type="text/javascript" src="jquery.tablesorter.js"></script>
<script type="text/javascript" src="jquery.tableEditor.js"></script>
<script type="text/javascript" src="validate.js"></script>
<script type="text/javascript" src="common.js"></script>

<style>
key { display: none; }
input.pvInvalid, select.pvInvalid
{
	border: 1px solid red;
}
</style>

</head>
<body>

<h1>TableEditor</h1>
<h2>Flexible in place editing of TableSorter</h2>
<hr>

<h3>RESTORE EXAMPLE</h3>
<p><a href="demo.php">&laquo; Back to main page</a></p>
<p>This example demonstrates the the APPLY CLASS toggle. It also demonstrates the noEdit selector. Apply Class applies all classes found in the
table header of a column to a column row. For instance, if you have a class of "email" assigned to the second table header,
the second cell of each row will inherit the "email" class when the row is made editable. This is useful during row processing in the user functions.</p>

<p>This example uses APPLY CLASS to know what type of data is expected 
for each cell(column) in an editable row. The table headers (&lt;th&gt;'s) are assigned
a class designating the column type (email, number, not empty, etc.) so that a correct validation
rule can be applied. <span style="color: red; font-weight: bold;">NOTE: Phone must be a number(int) (class: pvNumber), Email an email (class: pvEmail), and Last name NOT EMPTY (class: pvEmpty). Validation uses my validation script -- see validate.js</span></p>

<p>FURTHER, giving a &lt;th&gt; the class noEdit will prevent its cells from becoming editable. Of course "no edit" selector can
be overridden by providing COL_NOEDIT_SELECTOR: "selector" when calling tableEditor on a table. By default it is; COL_NOEDIT_SELECTOR: ".noEdit"
</p>

<table id="editableTable" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th name="ID">ID</th>
			<th name="first" class="noEdit">First Name</th>
			<th name="last" class="validate pvEmpty">Last Name</th>
			<th class="validate pvNumber">Phone</th>
			<th name="city">City</th>
			<th name="email" class="validate pvEmail">Email</th>
		</tr>
		<tr>
			<td><key>233</key> <button class="eventLink">edit</button></td>
			<td><input type="text" name="XXXX" val="YYYY"></input></td>
			<td></td>
			<td><input type="checkbox" checked name="zzTop"></input></td>
			<td><input type="checkbox" name="yyy"></input></td>
			<td><select name="yyy"><option>XXX</option><option SELECTED>YYY</option></select></td>
		</tr>
	</thead>
	<tbody>
<?php

// print data.csv into a sortable HTML table
$handle = fopen("data.csv", "r");
while (($line = fgetcsv($handle, 1000)) !== FALSE) {
   echo "\t\t<tr>\n"; 
   for ($col=0; $col < count($line); $col++) {
   	echo "\t\t\t<td>";
   	echo ($col == 0) ?
   		'<key>'.$line[$col].'</key> <button class="eventLink">edit</button>' :
   		$line[$col];
   	echo "</td>\n";
   }
   echo "\t\t</tr>\n";
}
fclose($handle);
?>
	</tbody>
</table>

<br>
<h3>SOURCE</h3>
<pre>
&lt;script type="text/javascript"&gt;
$().ready(function() {	
	$("#editableTable").tableSorter({ 
		sortClassAsc: 'headerSortUp', 		// class name for ascending sorting action to header
		sortClassDesc: 'headerSortDown',	// class name for descending sorting action to header
		headerClass: 'header', 				// class name for headers (th's)
		disableHeader: 'ID' 	// DISABLE Sorting on <th>ID</th>
	}).tableEditor({
		COL_APPLYCLASS: true,
		EDIT_HTML: 'edit',
		SAVE_HTML: 'save',
		EVENT_LINK_SELECTOR: 'button.eventLink',
		FUNC_POST_EDIT: 'postEdit'
	});
	
	document.counter = 1;
});

// inject validation
function postEdit(o) {
	// PARAMS -->
	//   add validation to input and select tags with class "validate"
	//   submit button is CSS selector; "../td button.edit"
	//   warn on errors (true)
	//   pass scope (o.row)
	PommoValidate.reset(); // TODO -- validate must be scoped to this ROW. Modify validate.js
	PommoValidate.init('input.validate, select.validate','../td button.eventLink', true, o.row);

}
&lt;/script&gt;
</pre>

<br>
<hr>
(c) 2006 - <a href="http://www.iceburg.net/">Brice Burgess</a>
<hr>

<script type="text/javascript">
$().ready(function() {	
	$("#editableTable").tableSorter({ 
		sortClassAsc: 'headerSortUp', 		// class name for ascending sorting action to header
		sortClassDesc: 'headerSortDown',	// class name for descending sorting action to header
		headerClass: 'header', 				// class name for headers (th's)
		disableHeader: 'ID' 	// DISABLE Sorting on <th>ID</th>
	}).tableEditor({
		COL_APPLYCLASS: true,
		EDIT_HTML: 'edit',
		SAVE_HTML: 'save',
		EVENT_LINK_SELECTOR: 'button.eventLink',
		FUNC_POST_EDIT: 'postEdit'
	});
	
	document.counter = 1;
});

// inject validation
function postEdit(o) {
	// PARAMS -->
	//   add validation to input and select tags with class "validate"
	//   submit button is CSS selector; "../td button.edit"
	//   warn on errors (true)
	//   pass scope (o.row)
	PommoValidate.reset(); // TODO -- validate must be scoped to this ROW. Modify validate.js
	PommoValidate.init('input.validate, select.validate','../td button.eventLink', true, o.row);

}
</script>

</body>
</html>
