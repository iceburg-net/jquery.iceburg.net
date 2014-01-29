<html>
<head>
<link rel="stylesheet" type="text/css" href="stylenew.css" />
<script type="text/javascript" src="jquery.pack.js"></script>
<script type="text/javascript" src="jquery.tablesorter.js"></script>
<script type="text/javascript" src="jquery.tableEditor.js"></script>
<script type="text/javascript" src="validate.js"></script>

<script type="text/javascript">
$().ready(function() {	
	$("#editableTable").tableSorter({ 
		sortClassAsc: 'ASC', 		// class name for ascending sorting action to header
		sortClassDesc: 'DESC',	// class name for descending sorting action to header
		headerClass: 'header', 				// class name for headers (th's)
		disableHeader: 0 
	}).tableEditor({
		SAVE_HTML: '<img src="yes.png">',
		EDIT_HTML: '<img src="edit.png">',
		EVENT_LINK_SELECTOR: 'button.edit',
		COL_APPLYCLASS: true,
		ROW_KEY_SELECTOR: 'p.key',
		FUNC_POST_EDIT: 'postEdit'
	});
	
	$('#addNew').click(function() {
		var options = {
			CLASS: 'newRow', 
			VALUES: {
				email: 'auto@populated.com',
				chicago: 'bearsch'
			}
		};
		jQuery.tableEditor.lib.appendRow(options);
	});
	
	$('#addCopy').click(function() {
		var options = {
			KEY: -1,
			COPY: true
		};
		jQuery.tableEditor.lib.appendRow(options);
	});
});

// inject validation
function postEdit(o) {
	var inputSelector = 'input.pvV';
	var submitSelector = '../td button.edit'
	
	PommoValidate.reset();
	PommoValidate.init(inputSelector, submitSelector, true, o.row);
}
</script>

</head>
<body>

<h1>TableEditor</h1>
<h2>Flexible in place editing of TableSorter</h2>
<hr>

<h3>NEW ROW EXAMPLE</h3>
<p><a href="demo.php">&laquo; Back to main page</a></p>
<p>This example demonstrates how trivial it is to add a new row to 
the table. You can pass in options designating a class for the new row, 
the key, cell values, whether it should inherit these values, and the 
table the row should be added to.</p>

<p>Using a unique KEY for the new row
(0 by default) will allow your data source updater to ADD vs. UPDATE
the row. The datasource updater is likely an ajax submit defined in your
FUNC_UPDATE.</p>


<button id="addNew" class="b">Add New Row</button>
<button id="addCopy" class="b">Add Row Copy</button>
<br/><br/>

<table id="editableTable" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th name="ID"></th>
			<th name="email" class="pvV pvEmail">Email</th>
			<th name="first" class="pvV pvEmpty">First Name</th>
			<th name="last" class="pvV pvEmpty">Last Name</th>
			<th name="age" class="pvV pvNumber pvEmpty">Age</th>
			<th name="chicago">Chicago</th>
		</tr>
	</thead>
	<tbody>
<?php

// print data.csv into a sortable HTML table
$handle = fopen("datanew.csv", "r");
while (($line = fgetcsv($handle, 1000)) !== FALSE) {
   echo "\t\t<tr>\n"; 
   for ($col=0; $col < count($line); $col++) {
   	echo "\t\t\t<td>";
   	echo ($col == 0) ?
   		'<p class="key">'.$line[$col].'</p> <button class="edit"><img src="edit.png"></button>' :
   		$line[$col];
   	echo "</td>\n";
   }
   echo "\t\t</tr>\n";
}
fclose($handle);
?>
	<tr>
		<td><p class="key">2020</p> <button class="edit"><img src="edit.png"></button></td>
		<td><input type="text" value="abc@123.com"></input></td>
		<td>Iam</td>
		<td>FormMan</td>
		<td><select name="age"><option>3</option><option>17</option><option>21</option><option SELECTED>33</option><option>55</option><option>88</option><option>119</option></select></td>
		<td><input type="checkbox" checked></input></td>
	</tr>
	</tbody>
</table>

<br>
<h3>SOURCE</h3>
<pre>
&lt;script type="text/javascript"&gt;
$().ready(function() {	
	$("#editableTable").tableSorter({ 
		sortClassAsc: 'ASC', 		// class name for ascending sorting action to header
		sortClassDesc: 'DESC',	// class name for descending sorting action to header
		headerClass: 'header', 				// class name for headers (th's)
		disableHeader: 0 
	}).tableEditor({
		SAVE_HTML: '<img src="yes.png">',
		EDIT_HTML: '<img src="edit.png">',
		EVENT_LINK_SELECTOR: 'button.edit',
		COL_APPLYCLASS: true,
		ROW_KEY_SELECTOR: 'p.key',
		FUNC_POST_EDIT: 'postEdit'
	});
	
	$('#addNew').click(function() {
		var options = {
			CLASS: 'newRow', 
			VALUES: {
				email: 'auto@populated.com',
				chicago: 'bearsch'
			}
		};
		jQuery.tableEditor.lib.appendRow(options);
	});
	
	$('#addCopy').click(function() {
		var options = {
			KEY: -1,
			COPY: true
		};
		jQuery.tableEditor.lib.appendRow(options);
	});
});

// inject validation
function postEdit(o) {
	var inputSelector = 'input.pvV';
	var submitSelector = '../td button.edit'
	
	PommoValidate.reset();
	PommoValidate.init(inputSelector, submitSelector, true, o.row);
}
&lt;/script&gt;
</pre>

<br>
<hr>
(c) 2006 - <a href="http://www.iceburg.net/">Brice Burgess</a>
<hr>

</body>
</html>
