<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.pack.js"></script>
<script type="text/javascript" src="jquery.tablesorter.js"></script>
<script type="text/javascript" src="jquery.tableEditor.js"></script>
<script type="text/javascript" src="common.js"></script>

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
		FUNC_UPDATE: 'updateTable'
	});
});

function updateTable(o) {
	alert("Update function called!\n === Debug of Passed Object === \n"+
	"o.row: jQ Object of size: "+o.row.size()+"\n"+
	"o.key: "+common.dump(o.key)+"\n"+
	"o.changed: "+common.dump(o.changed)+"\n"+
	"o.original: "+common.dump(o.original));	
}
</script>

</head>
<body>

<h1>TableEditor</h1>
<h2>Flexible in place editing of TableSorter</h2>
<hr>
<h3>PURPOSE</h3>
<p>TableEditor provides flexible in place editing of HTML tables. 
User defined handler functions can easily be dropped in to, for example, 
update the data source via an AJAX request.</p>

<h3>PREVIEW</h3>

<form><!-- note; the <form> is not necessary. it just populates <input type="text"> with correct values -->
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
			<td><input type="text" name="XXXX" value="I'm a text input"/></td>
			<td>Not a form element</td>
			<td><input type="checkbox" checked name="check1"/></td>
			<td><input type="checkbox" name="check2"/></td>
			<td><select name="selection"><option>XXX</option><option SELECTED>YYY</option><option>ZZZ</option></select></td>
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
</form>

<h3>REQUIREMENTS</h3>
<p>TableEditor is a <a href="http://www.jquery.com">jQuery</a> plugin. 
It requires jQuery (1.0.3 recommended) and should be used in 
conjunction with Christian Bach's 
<a href="http://motherrussia.polyester.se/jquery-plugins/tablesorter/">
TableSorter
</a> plugin. Future versions will likely function independant of 
TableSorter.</p> 


<h3>FILES</h3>
<ul>
	<li>
		<a href="jquery.tableEditor.js">tableEditor plugin</a> by <a href="http://www.iceburg.net/">Brice Burgess</a>
	</li>
	<li>
		Modified <a href="jquery.tablesorter.js">tablesorter plugin</a> based off version 1.0.3 by <a href="http://motherrussia.polyester.se/jquery-plugins/tablesorter/">Christian Bach</a>
	</li>
</ul>


<h3>README</h3>
<p>Use documentation in the works. See Example(s), Program Flow, and source comments in tableEditor.js</p>


<h3>EXAMPLES</h3>
<ul>
	<li>
		<a href="example_simple.php">Simple</a>
	</li>
	<li>
		<a href="example_full.php">Full</a>
	</li>
	<li>
		<a href="example_restore.php">Restore Row</a>
	</li>
	<li>
		<a href="example_apply.php">Apply Class</a>
	</li>
	<li>
		<a href="example_new.php"><strong>Add New Rows</strong></a>
	</li>
</ul>

<h3>PROGRAM FLOW</h3>
<p>On table load, assign an "edit" event to all elements matching the configurable EVENT_LINK selector (by default; all table cell links of class "tsEditLink").  </p>
<p>When "edit" event is called;
<ol>
	<li>Execute PRE_EDIT function (if defined)</li>
	<li>Change "edit" event link to "save" event</li>
	<li>Disable sorting on table</li>
	<li>Make row cells editable</li>
	<li>Execute POST_EDIT function (if defined)</li>
</ol></p>
<p>When "save" event is called;
<ol>
	<li>Execute PRE_SAVE function (if defined)</li>
	<li>Make row cells non-editable, cache changed & original values to pass to UPDATE function</li>
	<li>Clear tableSorter's cache</li>
	<li>Execute UPDATE function (if defined)</li>
</ol>

<h3>CHANGES</h3>
<ul>
	<li>Added flexible method of adding a row (jQuery.tableEditor.lib.appendRow(...))</li>
	<li>Table options can now be accessed globally via the VAULT</li>
	<li>TableEditors can coexist on the same page at the same time</li>
	<li class="old">Speed up selection and assignment of edit event links</li>
	<li class="old">Added marking columns as noEdit [COL_NOEDIT_SELECTOR: ".noEdit"]</li>
	<li class="old">Added toggling of header class inheritance [COL_APPLYCLASS]</li>
	<li class="old">Bugfixes on HTML elements</li>
	<li class="old">Added function to restore a row to its originals (if an update fails) to $.tableEditor.lib.restoreRow(row, originals)
</ul>

<h3>TODO</h3>
<ul>
	<li>Add intuitive+toggable ability to "cancel" edit</li>
	<li>Add intuitive+toggable ability to "delete" rows</li>
	<li>Make integration with tableSorter more seamless. I'd like to only extend the object...</li>
	<li>Demonstrate AJAX request/handling to update table's datasource using A) CSV File B) MySQL table</li>
	<li class="old">Offer version independent of tableSorter</li>
	<li>Off Topic: Extend scope of validation library so that it's unique per object</li>
</ul>

<br>
<hr>
(c) 2006 - <a href="http://www.iceburg.net/">Brice Burgess</a>
<hr>

</body>
</html>
