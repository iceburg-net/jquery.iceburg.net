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

<h3>FULL EXAMPLE</h3>
<p><a href="demo.php">&laquo; Back to main page</a></p>
<p>A full featured real life example of how to use this plugin. 
It uses the PRE_EDIT function to change a field to a predefined selection. 
Client side validation is then injected on input during POST_EDIT -- 
<span style="color: red; font-weight: bold;">watch that invalid email!</span> 
Input is further sanitized (stripped of non alpha-numeric characters 
and trimmed to no more than 10 characters) during PRE_SAVE. 
Finally, the datasource is updated via an AJAX request in FUNC_UPDATE. 
If the AJAX request fails, the row is returned to its original values.</p>

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
</table>

<br>
<h3>SOURCE</h3>
<pre>
&lt;script type="text/javascript"&gt;
$().ready(function() {	
	$("#editableTable").tableSorter({
		sortColumn: 'First Name',			// Integer or String of the name of the column to sort by.  
		sortClassAsc: 'headerSortUp', 		// class name for ascending sorting action to header
		sortClassDesc: 'headerSortDown',	// class name for descending sorting action to header
		headerClass: 'header', 				// class name for headers (th's)
		disableHeader: 'ID' 	// DISABLE Sorting on <th>ID</th>
	}).tableEditor({
		EDIT_HTML: 'edit',
		SAVE_HTML: 'save',
		EVENT_LINK_SELECTOR: 'button.eventLink',
		FUNC_PRE_EDIT: 'preEdit',
		FUNC_POST_EDIT: 'postEdit',
		FUNC_PRE_SAVE: 'preSave',
		FUNC_UPDATE: 'updateTable'
	});
});

// convert city to a predefined select box
function preEdit(o) { 
	// get the fourth column (city)
	var col = o.row[3];
	
	// get the existing value
	var val = o.row[3].innerHTML;
	
	var html = "<select><option>Balbec</option><option>Budapest</option><option>Cape Town</option><option>Chicago</option><option>Chonquing</option><option>Houston</option><option>London</option><option>Milwaukee</option><option>Munchen</option><option>Washington D.C.</option></select>";
	
	$(col).html(html).find('select option').each(function() {
		if ($(this).html() == val)
			$(this).attr("selected", true);
	});
}

// inject client side validation
function postEdit(o) {
	PommoValidate.reset();
	
	// add validation & non empty validator to row cells
	o.row.find("select, input").addClass('validate pvEmpty').end();
	
	// add email validator to email cell
	// TODO -- better way to access 4th element?
	$(o.row.get(4)).find("input").addClass('pvEmail').end;
	
	// initialize validation
	//var saveButton = $('../../td button.eventLink', o.row);
	PommoValidate.init('input.validate, select.validate','../td button.eventLink', true, o.row);
}

// remove alphanumeric characters, shorten all strings to < 10 chars
function preSave(o) {
	o.row.find("input, select").each(function() {
		var val = common.sanitize($(this).val());
		$(this).val(val);
	}).end();
}

function updateTable(o) {
	// make AJAX call to update the datasource.
	// NOT YET show for demonstration.
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
		sortColumn: 'First Name',			// Integer or String of the name of the column to sort by.  
		sortClassAsc: 'headerSortUp', 		// class name for ascending sorting action to header
		sortClassDesc: 'headerSortDown',	// class name for descending sorting action to header
		headerClass: 'header', 				// class name for headers (th's)
		disableHeader: 'ID' 	// DISABLE Sorting on <th>ID</th>
	}).tableEditor({
		EDIT_HTML: 'edit',
		SAVE_HTML: 'save',
		EVENT_LINK_SELECTOR: 'button.eventLink',
		FUNC_PRE_EDIT: 'preEdit',
		FUNC_POST_EDIT: 'postEdit',
		FUNC_PRE_SAVE: 'preSave',
		FUNC_UPDATE: 'updateTable'
	});
});

// convert city to a predefined select box
function preEdit(o) { 
	// get the fourth column (city)
	var col = o.row[3];
	
	// get the existing value
	var val = o.row[3].innerHTML;
	
	var html = "<select><option>Balbec</option><option>Budapest</option><option>Cape Town</option><option>Chicago</option><option>Chonquing</option><option>Houston</option><option>London</option><option>Milwaukee</option><option>Munchen</option><option>Washington D.C.</option></select>";
	
	$(col).html(html).find('select option').each(function() {
		if ($(this).html() == val)
			$(this).attr("selected", true);
	});
}

// inject client side validation
function postEdit(o) {
	PommoValidate.reset();
	
	// add validation & non empty validator to row cells
	o.row.find("select, input").addClass('validate pvEmpty').end();
	
	// add email validator to email cell
	// TODO -- better way to access 4th element?
	$(o.row.get(4)).find("input").addClass('pvEmail').end;
	
	// initialize validation
	//var saveButton = $('../../td button.eventLink', o.row);
	PommoValidate.init('input.validate, select.validate','../td button.eventLink', true, o.row);
}

// remove alphanumeric characters, shorten all strings to < 10 chars
function preSave(o) {
	o.row.find("input, select").each(function() {
		var val = common.sanitize($(this).val());
		$(this).val(val);
	}).end();
}

function updateTable(o) {
	// make AJAX call to update the datasource.
	// NOT YET show for demonstration.
	
	// restore city to regular text
	var val = $(o.row[3]).find("select").val();
	$(o.row[3]).html(val);
	
	return true;
}

</script>

</body>
</html>
