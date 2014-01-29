<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.pack.js"></script>
<script type="text/javascript" src="jquery.tablesorter.js"></script>
<script type="text/javascript" src="jquery.tableEditor.js"></script>

<script type="text/javascript">
$().ready(function() {	
	$("#editableTable").tableSorter({
		sortColumn: 'First Name',			// Integer or String of the name of the column to sort by.  
		sortClassAsc: 'headerSortUp', 		// class name for ascending sorting action to header
		sortClassDesc: 'headerSortDown',	// class name for descending sorting action to header
		headerClass: 'header', 				// class name for headers (th's)
		disableHeader: 'ID' 	// DISABLE Sorting on <th>ID</th>
	}).tableEditor({
		EDIT_HTML: 'EDIT2',
		SAVE_HTML: 'Save',
		FUNC_PRE_EDIT: 'preEdit',
		FUNC_POST_EDIT: 'postEdit',
		FUNC_PRE_SAVE: 'preSave',
		FUNC_UPDATE: 'updateTable'
	});
});

function updateTable(o) {
	alert('FUNC_UPDATE called');
}

function preSave(o) {
	alert('FUNC_PRE_SAVE called');
}

function postEdit(o) {
	alert('FUNC_POST_EDIT called');
}

function preEdit(o) {
	alert('FUNC_PRE_EDIT called');
}
</script>

</head>
<body>

<h1>TableEditor</h1>
<h2>Flexible in place editing of TableSorter</h2>
<hr>

<h3>SIMPLE EXAMPLE</h3>
<p><a href="demo.php">&laquo; Back to main page</a></p>
<p>This example simply alerts when each user defined function is called</p>

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
			<td><key>233</key> <a href="#.php" class="tsEditLink">(edit)</a></td>
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
   		'<key>'.$line[$col].'</key> <a href="#" class="tsEditLink">(edit)</a>' :
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
		sortColumn: 'First Name',			// Integer or String of the name of the column to sort by.  
		sortClassAsc: 'headerSortUp',		// class name for ascending sorting action to header
		sortClassDesc: 'headerSortDown',	// class name for descending sorting action to header
		headerClass: 'header', 				// class name for headers (th's)
		disableHeader: 'ID' 	// DISABLE Sorting on <th>ID</th>
	}).tableEditor({
		EDIT_HTML: 'EDIT2',
		SAVE_HTML: 'Save',
		FUNC_PRE_EDIT: 'preEdit',
		FUNC_POST_EDIT: 'postEdit',
		FUNC_PRE_SAVE: 'preSave',
		FUNC_UPDATE: 'updateTable'
	});
});

function updateTable(o) {
	alert('FUNC_UPDATE called');
}

function preSave(o) {
	alert('FUNC_PRE_SAVE called');
}

function postEdit(o) {
	alert('FUNC_POST_EDIT called');
}

function preEdit(o) {
	alert('FUNC_PRE_EDIT called');
}
&lt;/script&gt;
</pre>

<br>
<hr>
(c) 2006 - <a href="http://www.iceburg.net/">Brice Burgess</a>
<hr>

</body>
</html>
