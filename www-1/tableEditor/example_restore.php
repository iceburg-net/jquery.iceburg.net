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
<p>This example demonstrates the restoreRow() function. 
This is useful if your AJAX update failed and the values (in table) 
should be restored to the original. 
<span style="color: red; font-weight: bold;">NOTE:</span> every other 
request will fail.</p>
<p><em>$.tableEditor.lib.restoreRow(o.row,o.original);</em> is used within the update function to restore the row</p>

<table id="editableTable" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th name="ID">ID</th>
			<th name="first">First Name</th>
			<th name="last">Last Name</th>
			<th>Phone</th>
			<th name="city">City</th>
			<th name="email">Email</th>
		</tr>
		<tr>
			<td><key>233</key> <button class="eventLink">edit</button></td>
			<td><input type="text" name="XXXX" val="YYYY"></input></td>
			<td>XXX</td>
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
		EDIT_HTML: 'edit',
		SAVE_HTML: 'save',
		EVENT_LINK_SELECTOR: 'button.eventLink',
		FUNC_UPDATE: 'updateTable'
	});
	
	document.counter = 0;
});

function updateTable(o) {
	document.counter++;
	
	if ((document.counter%2) == 0) {
		// restore row
		alert('Update failed. Row restore.');
		$.tableEditor.lib.restoreRow(o.row,o.original);
	}
	else
		alert('Update Success');
		
	return true;
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
		EDIT_HTML: 'edit',
		SAVE_HTML: 'save',
		EVENT_LINK_SELECTOR: 'button.eventLink',
		FUNC_UPDATE: 'updateTable'
	});
	
	document.counter = 1;
});

function updateTable(o) {
	document.counter++;
	
	if ((document.counter%2) == 0) {
		// restore row
		alert('Update failed. Row restore.');
		$.tableEditor.lib.restoreRow(o.row,o.original);
	}
	else
		alert('Update Success');
		
	return true;
}
</script>

</body>
</html>
