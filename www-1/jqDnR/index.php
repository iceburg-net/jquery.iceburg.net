<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php require('../common/lib.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>jqDnR :: Minimalistic Drag'n'Resize for jQuery</title>
<meta name="author" content="Brice Burgess" />
<meta name="description" content="Minimalistic Drag and Resize for jQuery. Javascript Drag and Resize" />
<meta name="keywords" content="drag, resize, jquery, javascript" />

<!--  Page Styling -->
<link type="text/css" rel="stylesheet" media="all" href="../common/css/common.css" />
<link type="text/css" rel="stylesheet" media="all" href="../common/css/example.css" />

<!--  jqDnR Required -->
<script type="text/javascript" src="../common/js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="jqDnR.js"></script>

<!--  jqDnR Recommended -->
<script type="text/javascript" src="../common/js/dimensions.js"></script>

<!--  jqModal [optional] -->
<script type="text/javascript" src="../jqModal/jqModal.js"></script>

</head>
<body>
<div class="box">

<div class="wwwwh">Who?</div>

<div id="heading">
jqDnR <p>Minimalistic Drag'n'Resize for jQuery</p>
</div>

<br />

<div class="wwwwh">What?</div>

<p>
jqDnR is a lightweight plugin for <a href="http://www.jquery.com/">jQuery</a> that lets you drag, drop, and resize elements.
</p>

<p><em>Features</em>;</p>
<ul>
<li>Drag + Drop Element Posistioning</li> 
<li>South East Resizing</li>
<li>Definable Drag and Resize "handles"</li>
<li>Translucent Dragging, Preservation of Original Opacity</li>
</ul>

<div class="wwwwh">Why?</div>
<p>
I wrote jqDnR to compliment <a href="../jqModal/">jqModal</a> elements, allowing drag+resize functionality while remaining true to the plugin's minimalistic architecture. jqDnR provides the all the basic elastic functionality most dialogs will need. For those seeking a full-featured solution, see <a href="http://interface.eyecon.ro/">Interface Elements for jQuery</a>. 
</p>
<p>
If you like jqDnR, please consider a dontation to support its development:
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHNwYJKoZIhvcNAQcEoIIHKDCCByQCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYCra8W5qbASUTPeUy25zkfm179nPYfg9oeRwRwwmOagP1RM/RTQgB/PC6LKXS6OAZHEllV+Js7ndn5YtXc0KRO8e50I2Gr8y0g3g075WIpmlWvL0PIYGRnfJW+YJu+zWoEfCQHH/+3a3o1rPN6+FVqFKzUs8w+SEyLHlzEL+Z94HzELMAkGBSsOAwIaBQAwgbQGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIaY4Mn8SU2OyAgZAD3/NmNl+fxUYZRhQLfp0ZwtegunrFRX9h1lmg+yODHknBzRTa/Y3PA3ZPTdR5iks//+5CioQH3VLbBXZKhA8d1opynKCFw7QJXSAR3VoHNOK7iMCuTSvXHyxpH++ZYLBs/7enU0iNPax9blVTnHe5/xqPrpyRIR4AceNEXd9YxZNLBgQZVNTdmEMic/fNep6gggOHMIIDgzCCAuygAwIBAgIBADANBgkqhkiG9w0BAQUFADCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wHhcNMDQwMjEzMTAxMzE1WhcNMzUwMjEzMTAxMzE1WjCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMFHTt38RMxLXJyO2SmS+Ndl72T7oKJ4u4uw+6awntALWh03PewmIJuzbALScsTS4sZoS1fKciBGoh11gIfHzylvkdNe/hJl66/RGqrj5rFb08sAABNTzDTiqqNpJeBsYs/c2aiGozptX2RlnBktH+SUNpAajW724Nv2Wvhif6sFAgMBAAGjge4wgeswHQYDVR0OBBYEFJaffLvGbxe9WT9S1wob7BDWZJRrMIG7BgNVHSMEgbMwgbCAFJaffLvGbxe9WT9S1wob7BDWZJRroYGUpIGRMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbYIBADAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4GBAIFfOlaagFrl71+jq6OKidbWFSE+Q4FqROvdgIONth+8kSK//Y/4ihuE4Ymvzn5ceE3S/iBSQQMjyvb+s2TWbQYDwcp129OPIbD9epdr4tJOUNiSojw7BHwYRiPh58S1xGlFgHFXwrEBb3dgNbMUa+u4qectsMAXpVHnD9wIyfmHMYIBmjCCAZYCAQEwgZQwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMAkGBSsOAwIaBQCgXTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0wNzAyMjEyMzUyNDhaMCMGCSqGSIb3DQEJBDEWBBTTpidIK5YE817gr+84He9/1rAdLDANBgkqhkiG9w0BAQEFAASBgD9LMYsplPejp8LWcLm+8nboKu1F19TYiG3hAIyhdB5Ag6wqbb8YD9/fdV3xljOq7zgO4KVTwI+lU7xGyZWH9EU6nONRxS53VqWrhuXo8JzILC/HmqyV9OpmQwC7CxQcbzfLcPGAVimZjTRicRATPY0xLSgh0Tdfs6/Y8TOu3IFT-----END PKCS7-----
">
</form>
</p>

<div class="wwwwh">When?</div>
<p>
Current Version: <em>2007.08.19 +r2</em>
<br /> (c) 2007 Brice Burgess under The <a href="http://www.opensource.org/licenses/mit-license.php">MIT</a> License
</p>

<div class="wwwwh">Where?</div>
<p>
Download the <em><a href="jqDnR.js">Plugin</a></em> (jqDnR.js - 972 bytes)
<br /><br />
Download the <em><a href="../inc/dimensions.js">Dimensions Plugin</a></em> (dimensions.js) <strong>[OPTIONAL]</strong> - If detected, the <a href="http://jquery.com/plugins/project/dimensions">dimensions plugin</a> by Brandon Aaron  will be used to alleviate Internet Explorer "jumpiness" with elements that have fixed or percentage based position.
<br /><br />
&nbsp;&nbsp;[file sizes reflect <strong>un</strong>compressed source with header removed]
</p>

<div class="wwwwh">How?</div>

<p>
If you need <em>support</em> or have <em>comments</em>, please post to the <a href="http://www.nabble.com/JQuery-f15494.html">jQuery mailing list</a>.
</p>

<p>
<strong>IMPORTANT</strong>; If an element is to be resized or dragged, it MUST have its positioning set to ABSOLUTE, RELATIVE, or FIXED.
</p>

<p><em>Examples</em></p>

<div class="example">
1. <em>Resize</em>
</div>
<?php exSource(1,array()); ?>

<div class="example">
2. <em>Drag</em>
</div>
<?php exSource(2,array('css' => false)); ?>

<div class="example">
3. <em>Resize + Drag</em>
</div>
<?php exSource(3,array('css' => false)); ?>

<br clear="both" />

<div class="wwwwh">Etc.</div>

<p><em>Known Issues, Pending Changes</em>;</p>
<ul>
<li>Please report any issues or odd behavior</li>
</ul>

<ul>
<li><strong>OPERA</strong> Dragging is broken for relatively posistioned elements (like the examples above) in current version of Opera. The left/top position of elements are returned incorrectly* by $.css('left') and $.css('top'), resulting in the element jumping far down the page. * Opera appears to always return the element position relative to page offset vs. parent element.</li>
<li>TODO (r3 or r4); Add minimum and maximum height and width during resize. Add onResize, onResizing, onDrag, onDragging, and onDrop callbacks.</li>
</ul>

</div>

<script type="text/javascript">
// common
$().ready(function() {
   $('div.src a').click(function(){
    $('../pre',this).toggle();
    return false;
   });
});
</script>

</body>
</html>
