<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php define('common-lib', true); require('../common/lib.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>jqModal :: Minimalistic Modaling for jQuery</title>
<meta name="author" content="Brice Burgess" />
<meta name="description" content="Minimalistic Modaling for jQuery. Modal Dialog Popup Windows in javascript." />
<meta name="keywords" content="modal, modal window, jquery, javascript, popup, dialog" />
<link type="text/css" rel="stylesheet" media="all" href="../common/css/common.css" />
<link type="text/css" rel="stylesheet" media="all" href="../common/css/example.css" />


<!-- jqModal Dependencies -->
<script type="text/javascript" src="../common/js/jquery-1.11.0.js"></script>
<script type="text/javascript" src="jqModal.js"></script>

<!--  jqModal Styling -->
<link type="text/css" rel="stylesheet" media="all" href="jqModal.css" />

<!-- Optional Javascript for Drag'n'Resize -->
<script type="text/javascript" src="inc/jqDnR.js"></script>

<script type="text/javascript">$().ready(function(){$('#nav').css('opacity',0.68);});</script>
</head>
<body>

<div id="nav">
<ul>
<li><a href="#who">About</a></li>
<li><a href="#where">Download</a></li>
<li><a href="#how">Usage</a></li>
<li><a href="#examples">Examples</a></li>
<li><a href="#etc">Etc.</a></li>
</div>

<div class="box">

<a class="anchor" name="who"></a>
<div class="wwwwh">Who?</div>

<div id="heading">
jqModal <p>Minimalist Modaling with jQuery</p>
</div>

<br />

<div class="wwwwh">What?</div>
<p>
jqModal is a plugin for <a href="http://jquery.com/">jQuery</a> to help you display modals, popups, and notices. It is flexible and tiny, akin to a "Swiss Army Knife", and provides a great base for your windowing needs.
</p>

<p><em>Features</em>;</p>
<ul>
<li>Designer Frieldly - Use *your* HTML+CSS for Layout and Styling</li>
<li>Translator/i18n friendly - No hardcoded English strings</li>
<li>Developer friendly - Extensible through callbacks to make anything possible (gallery slideshows, video-conferencing, &c)</li>
<li>Simple support for remotely loaded content (aka "ajax")</li> 
<li>Multiple Modals per page (including nested Modal-in-Modal)</li>
<li>Supported by all browsers capable of running jQuery 1.2.3+</li>
</ul>

<div class="wwwwh">Why?</div>
<p>
There is no shortage of dialog scripts that dazzle their audience. Some will try to walk your dog. They can be rooted in unnecessary effects, rigid, and cumbersome. This is not where jqModal is headed! I wanted to write a simple modal framework. Something <em>lightweight</em> yet <em>powerful</em> and <em>flexible</em>. The original strived to resemble an assembly <a href="http://en.wikipedia.org/wiki/Demoscene">demoscene</a> binary. Since r16 jqModal is readable and <a href="https://github.com/briceburg/jqModal/">community</a> maintainable.
</p>
<p>
If you like jqModal, please consider a dontation to support its development:
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
</form>
</p>

<div class="wwwwh">When?</div>
<p>
Current Version: 1.0.3 <em>2014.07.03 +r21</em>
<br /> Copyright &copy; 2007-<?php echo date('Y'); ?> Brice Burgess - released under both the <a href="http://www.opensource.org/licenses/mit-license.php">MIT</a> and <a href="http://www.gnu.org/licenses/gpl.html">GPL</a> licenses.
</p>

<a class="anchor" name="where"></a>
<div class="wwwwh">Where?</div>
<p>
Download the <em><a href="jqModal.js">Plugin</a></em> (jqModal.js) [jQuery >= <strong>1.2.3</strong>]
<br />
Download the <em><a href="jqModal.css">Styling</a></em> (jqModal.css) 
<br /><br />
<strong>[<a href="https://github.com/briceburg/jqModal/">SOURCECODE</a>] &middot; [<a href="https://github.com/briceburg/jqModal/blob/master/CHANGELOG.md">CHANGELOG</a>] &middot; [<a href="https://github.com/briceburg/jqModal/tree/master/releases">RELEASES</a>]</strong>
<br /><br />
<strong>[OPTIONAL]</strong> <em><a href="../jqDnR/">Drag'n'Resize Plugin</a></em> (jqDnR.js - 874 bytes) - any other <a href="http://jqueryui.com/draggable/">drag</a> & <a href="http://wayfarerweb.com/jquery/plugins/animadrag/">drop</a> plugin will work.
</p>

<strong>Image Caching NOTE</strong>; Some browsers do not preload background images and image elements if they are hidden which can 
effect the responsiveness of your dialogs. This page uses an OPTIONAL workaround to get around this issue. It preloads dialog decoration images for faster display. 
See the code used by clicking the HTML tab below;
<div class="src">
<div class="html">
<a href="#">HTML</a>
<pre>
&lt;!-- optional: image cacheing. Any images contained in this div will be
	loaded offscreen, and thus cached --&gt;
	
&lt;style type="text/css"&gt;
/* Caching CSS created with the help of;
	Klaus Hartl &lt;klaus.hartl@stilbuero.de&gt; */
@media projection, screen {
     div.imgCache { position: absolute; left: -8000px; top: -8000px; }
     div.imgCache img { display:block; }
}
@media print { div.imgCache { display: none; } }
&lt;/style&gt;

&lt;div class="imgCache"&gt;
	&lt;img src="inc/busy.gif" /&gt;
	&lt;img src="img/dialog/close.gif" /&gt;
	&lt;img src="img/dialog/sprite.gif" /&gt;
	&lt;img src="img/dialog/bl.gif" /&gt;
	&lt;img src="img/dialog/br.gif" /&gt;
	&lt;img src="img/dialog/bc.gif" /&gt;
	&lt;img src="img/notice/note_icon.png" /&gt;
	&lt;img src="img/notice/close_icon.png" /&gt;
&lt;/div&gt;
</pre>
</div></div>

<!-- optional: image caching. Any images contained in this div will be
	loaded offscreen, and thus cached.-->
	
<style type="text/css">
/* Caching CSS courtesf of;
	Klaus Hartl <klaus.hartl@stilbuero.de> */
@media projection, screen {
     div.imgCache { position: absolute; left: -8000px; top: -8000px; }
     div.imgCache img { display:block; }
}
@media print { div.imgCache { display: none; } }
</style>

<div class="imgCache">
	<img src="inc/busy.gif" />
	<img src="img/dialog/close.gif" />
	<img src="img/dialog/sprite.gif" />
	<img src="img/dialog/bl.gif" />
	<img src="img/dialog/br.gif" />
	<img src="img/dialog/bc.gif" />
	<img src="img/notice/note_icon.png" />
	<img src="img/notice/close_icon.png" />
</div>

<div style="width:100%;text-align:center;clear:both;">Test for Internet Explorer 6: <select><option>ActiveX Bleed?</option><option>hope not!</option></select></div>

<a class="anchor" name="how"></a>
<div class="wwwwh">How?</div>

<p><em>Usage</em></p>
<dl>
<dt>1. Add modal element(s) to your page</dt>
<dd>Modal elements are usually &lt;div&gt; containers with their visibility set to hidden. CSS is used for styling and position. Modals are displayed("shown") when a trigger event occurs. Their contents can be inline (hardcoded in the HTML) or added via ajax when the modal is shown.</dd>
<dt>2. Initialize your modal(s)</dt>
<dd>Modal elements must be initialized via <strong>$.jqm()</strong> before they can be shown. You can customize your modals by passing an options object (e.g. <strong>$('#modal').jqm({modal: true, trigger: 'a.showModal'});</strong>). 
<p />
NOTE: $.jqm() is usually called ONCE per modal. Subsequent calls to $.jqm() will update the modal(s) options using <a href="http://api.jquery.com/jquery.extend/">jQuery.extend()</a>.</dd>
<dt>3. Trigger your modal</dt>
<dd>Modals are shown when a "trigger" element is clicked, or manually triggered via <strong>$('#modal').jqmShow()</strong>.
</dl>

<p><em>Functions</em></p>
<dl>
<dt>jqm</dt>
<dd> 
 Initialize element(s) as modals. Accepts an options object. If a modal is already initialized, the call will update its options via <a href="http://api.jquery.com/jquery.extend/">jQuery.extend()</a>.
 
 <p class="code">
 $('#dialog').jqm(); <br />
 $('.dialogs').jqm({ajax:'@href',modal:true});
 </p>
</dd>

<dt>jqmShow</dt>
<dd> 
 Show modal element(s). Will not execute on opened modals.
 
 <p class="code">
 $('#dialog').jqmShow(); <br />
 $('.dialogs').jqmShow();
 </p>
 
</dd>

<dt>jqmHide</dt>
<dd> 
 Hide modal element(s). Will not execute on closed modals.
 
 <p class="code">
 $('#dialog').jqmHide(); <br />
 $('.dialogs').jqmHide();
 </p>
 
</dd>

<dt>jqmAddTrigger</dt>
<dd> 
 Called on a modal(s). Passed element(s) will show the modal(s) when clicked.
  Accepts;
  <ul>
      <li>(string) A jQuery <a href="http://docs.jquery.com/Selectors">Selector</a></li>
      <li>(object) A jQuery Collection</li>
      <li>(object) A DOM element</li>
  </ul>
 
 <p class="code">
 $('#dialog').jqmAddTrigger('.openDialog'); <br />
 $('.dialogs').jqmAddTrigger($('#openDialogs a'));
 </p>
 
</dd>

<dt>jqmAddClose</dt>
<dd> 
 Called on a modal(s). Passed element(s) will close the modal(s) when clicked.
  Accepts;<ul>
      <li>(string) A jQuery <a href="http://docs.jquery.com/Selectors">Selector</a></li>
      <li>(object) A jQuery Collection</li>
      <li>(object) A DOM element</li>
  </ul>
 
 <p class="code">
 $('#dialog').jqmAddClose('.hideDialog'); <br />
 $('.dialogs').jqmAddClose($('#hideDialogs a'));
 </p>
 
</dd>
</dl>

<p><em>Defaults</em></p>
<dl>
<dt>$.jqm</dt>
<dd>
You may override default option values and the focus function by altering <strong>$.jqm.params</strong> and <strong>$.jqm.focusFunc</strong> accordingly.
</dd>
</dl>


<p><em>Options</em></p>

Options allow tailoring the behavior of modals. 

<dl>
<dt>overlay</dt>
<dd>The overlay transparency as a percentage. If 0 the overlay is disabled and
 the page behind the modal will remain interactive. If 100 the overlay will be 100% opaque.
 <p class="pv">(integer) - default: 50</p>
</dd>

<dt>overlayClass</dt>
<dd>Name of CSS class applied to the overlay.
 <p class="pv">(string) - default: 'jqmOverlay'</p>
</dd>

<dt>closeClass</dt>
<dd>Child elements of the modal with a CSS class of closeClass will close the modal when clicked.  
 <p class="pv">(string|false) - default: 'jqmClose'</p>
</dd>

<dt>trigger</dt>
<dd>
  Elements matching trigger will show the modal when clicked. Triggers can be;
    <ul>
      <li>(string) A jQuery <a href="http://docs.jquery.com/Selectors">Selector</a></li>
      <li>(object) A DOM element (e.g. $.jqm({trigger: document.getElementByID("showDialog")})</li>
      <li>(false) The call to $.jqm() will not attach trigger events to elements.</li>
    </ul>
 <p class="pv">(string|object|false) - default: '.jqModal'</p>
</dd>

<dt>ajax</dt>
<dd>Modal contents will be loaded remotely via ajax if passed. You can pass the URL
(e.g. $.jqm({ajax:'remote/dialog.html'}) or extract it from an attribute of the triggering element.
For instance, $(.jqm({ajax:'@href'}) would grab contents from `foo/bar.html` if the triggering element was &lt;a href="foo/bar.html"&gt;Open Modal&lt;/a&gt;.
If a more complicated routine is desired, use the onShow() callback.    
 <p class="pv">(string|false) - default: false</p>
</dd>

<dt>target</dt>
<dd>
 <p class="pv">NOTE: target is applicable only if the ajax parameter is passed.</p>
 Child element(s) of the modal to load ajax response into. If false, modal contents will be overwritten by ajax response. Useful for retaining modal design. Target can be;
 <ul>
      <li>(string) A jQuery <a href="http://docs.jquery.com/Selectors">Selector</a></li>
      <li>(object) A DOM element (e.g. $.jqm({target: $('#dialog div.contents')[0]})</li>
      <li>(false) ajax return overwrites dialog's innerHTML</li>
    </ul>
 <p class="pv">(string|false) - default: false</p>
</dd>

<dt>ajaxText</dt>
<p class="pv">NOTE: ajaxText is applicable only if the ajax parameter is passed.</p>
<dd>Text shown while waiting for ajax return. Replaces HTML content of `target` element. May include HTML (such as an loading image). E.g. $.jqm({ajaxText: '&lt;marquee style="width: 1.5em;"&gt;.. ... .&lt;/marquee&gt;'});</p>
 <p class="pv">(string) - default: ''</p>
</dd>

<dt>modal</dt>
<dd>Restricts input (mouse clicks, keypresses) to the modal. If false, and if overlay is enabled, clicking the overlay will close the modal.  
 <p class="pv">(boolean) - default: false</p>
</dd>

<dt>toTop</dt>
<dd>When true; places the dialog element as a direct child of &lt;body&gt; when shown. This was added to help overcome z-Index stacking order issues.
<br />
See the <a href="toTop.html">toTop demo</a> to learn what to do if your overlay covers the entire page *including* the modal dialog!  
 <p class="pv">(boolean) - default: false</p>
</dd>

<dt>[Callbacks]</dt>
<dd>Callbacks allow advanced customization of jqModal dialogs. Each callback is passed the "hash" object consisting of the following properties;

    <ul>
      <li>w: (jQuery object) The modal element</li>
      <li>c: (object) The modal's options object </li>
      <li>o: (jQuery object) The overlay element</li>
      <li>t: (DOM object) The triggering element
    </ul>
  	
</dd>

<dt>onShow (callback)</dt>
<dd> 
 Called when a modal is to be shown. Responsible for showing a modal and overlay.

 <p class="code">
 $('#dialog').jqm({ <br />
   onShow: function(hash) { <br />
     hash.o.prependTo('body'); <br />
     hash.w.css('opacity',0.88).fadeIn(); <br />
   }}); <br />
 </p>
 <p class="pv">(function|false) - default: false</p>
 
 	<pre>
From jqModal.js >
// onShow callback. Responsible for showing a modal and overlay.
//  return false to stop opening modal. 
		
// hash object;
//  w: (jQuery object) The modal element
//  c: (object) The modal's options object 
//  o: (jQuery object) The overlay element
//  t: (DOM object) The triggering element
		
// display the overlay (prepend to body) if not disabled
if(hash.c.overlay > 0)
  hash.o.prependTo('body');
			
// make modal visible
hash.w.show();
		
// call focusFunc (attempts to focus on first input in modal)
$.jqm.focusFunc(hash.w);
		
return true;
}
	</pre>
</dd>

<dt>onHide (callback)</dt>
<dd> 
 Called when a dialog is to be hidden. Responsible for hiding a modal and overlay.
 
 <p class="code">
 $('#dialog').jqm({ <br />
   onHide: function(hash) { <br />
     hash.w.fadeOut('2000',function(){ hash.o.remove(); }); <br />
   }}); <br />
 </p>
 <p class="pv">(function|false) - default: false</p>
</dd>

 	<pre>
From jqModal.js >
onHide = function(hash){
// onHide callback. Responsible for hiding a modal and overlay.
//  return false to stop closing modal. 
	
// hash object;
//  w: (jQuery object) The modal element
//  c: (object) The modal's options object 
//  o: (jQuery object) The overlay element
//  t: (DOM object) The triggering element
	
// hide modal and if overlay, remove overlay.
hash.w.hide() && hash.o && hash.o.remove();
	
return true;
}
	</pre>

<dt>onLoad (callback)</dt>
<dd> 
 Called right after ajax content is loaded.
 
 <p class="code">
 // onLoad : assign Mike Alsup's most excellent <a href="http://www.malsup.com/jquery/form/">ajaxForm</a> plugin to the returned form element(s). <br />
 var myLoad = function(hash){ $('form',hash.w).ajaxForm(); }; <br />
 $('#dialog').jqm({onLoad:myLoad}); <br />
 </p>
    
 <p class="pv">(function|false) - default: false</p>
</dd>

</dl>

<a class="anchor" name="examples"></a>
<p><em>Examples</em></p>

<div class="example">
1. <em>Defaults</em> -- <a href="#" class="jqModal">view</a>
<br/>
Out-of-box behavior. The window and its content is taken "inline" from the element with an ID of 'dialog'. The dialog is "triggered" (shown) when element(s) with class <i>jqModal</i> are clicked. No parameters are passed, no fancy window decorations used.
</div>
<?php exSource(1,array('css' => false), '<a href="#" class="jqModal">view</a>'); ?>


<div class="example">
2. <em>AJAX</em> -- <a href="#" class="ex2trigger">view</a>
<br/>
This example demonstrates the ajax parameter. The window's content is pulled from a remote source (Relative URL: <i>examples/2.html</i>) when its trigger is clicked. The trigger parameter is used assign a "show trigger" to element(s) with class <i>ex2trigger</i>.
</div>
<?php exSource(2,array('css' => false), '<a href="#" class="ex2trigger">'); ?>


<div class="example">
3. <em>Styling</em> -- a. <a href="#" id="ex3aTrigger">view</a> (dialog), b. <a href="#" class="ex3bTrigger">view</a> (alert), c. <a href="#" id="ex3cTrigger">view</a> (notice)
<br/>
This example demonstrates the ease in which stylish windows are constructed. All HTML and CSS is abstracted from the plugin which allows a designer unprecedented flexibility. Notice how custom overlays, ajax targets, and callbacks are used. I hope to eventually provide a repository of dialog themes. <em>Interested in contributing?</em> -- see note @ bottom of page.
</div>
<p>
<?php exSource('3a',array(),'<a href="#" id="ex3aTrigger">view</a> (dialog)'); ?>
&nbsp; <strong>3a</strong> (dialog) - custom overlay, draggable window.
</p>
<p>
<?php exSource('3b',array(),'<a href="#" class="ex3bTrigger">view</a> (alert)'); ?>
&nbsp; <strong>3b</strong> (alert) - ajax target.
</p>
<p>
<?php exSource('3c',array(),'<a href="#" id="ex3cTrigger">view</a> (notice)'); ?>
&nbsp; <strong>3c</strong> (alert) - onShow, onHide callbacks.
</p>


<div class="example">
4. <em>Modal, Nested Modal</em> -- a. <a href="examples/4a.html" class="ex4Trigger">view</a> (4a.html), b. <a href="examples/4b.html" class="ex4Trigger">view</a> (4b.html)
<br/>
Focus can be forced on a dialog, making it a true "modal" dialog. <strong>NOTE</strong> you may override the focus function via `$.jqm.focusFunc`. Also exemplified is the <strong>ajax attribute selector</strong> (using @href). Any DOM attribute can be used to extract the ajax url (see the <a href="README">documentation</a>).
</div>
<?php exSource('4',array(),'<a href="examples/4a.html" class="ex4Trigger">view</a> (4a.html)'."\n".' <a href="examples/4b.html" class="ex4Trigger">view</a> (4b.html)'); ?>


<div class="example">
5. <em>Multi-Show/Hide</em> -- a. <a href="#" id="ex5show">view</a> (show all), b. <a href="#" id="ex5hide">view</a> (hide all), c. <a href="#" id="ex5multi">view</a> (show+hide some)
<br/>
Triggers can cotrol more than 1 jqModal. You can assign new show or hide triggers to any jqModal element with $.jqmAddTrigger and $.jqmAddClose. 
</div>
<?php exSource('5',array(),'<a href="#" id="ex5show">view</a> (show all)'."\n".'<a href="#" id="ex5hide">view</a> (hide all)'."\n".'<a href="#" id="ex5multi">view</a> (show+hide some)'); ?>


<div class="example">
6. <em>FUN! Overrides</em> -- a. <a href="#" class="alert">view</a> (alert), b. <a href="http://www.jquery.com/" class="confirm">view</a> (confirm)
<br/>
It is now time to show a real-world use for jqModal -- overriding the standard <em>alert()</em> and <em>confirm</em> dialogs! Note; due to the single threaded nature of javascript, the confirm() function must be passed a callback -- it does NOT return true/false.
</div>
<?php exSource('6',array(),'<a href="#" class="alert">view</a> (alert)'."\n".'<a href="#" class="confirm">view</a> (confirm)'); ?>

<div class="example">
7. <em>External Site (iframe) usage</em> (with added bling-in-the-box)
<br />
Alexandre Plennevaux has posted a <a href="http://www.pixeline.be/blog/2008/javascript-loading-external-urls-in-jqmodal-jquery-plugin/">tutorial</a> on effectively using jqModal to load external sites into a popup dialog. His method updates an iframe inside a dialog with the HREF attribute of the triggering element. It is an <strong>excellent</strong> example of real-world jqModal usage. As an added bonus; the bling-factor is furthered by showing off some fancy animated transistions! Be sure to check out his <a href="http://www.pixeline.be/experiments/ThickboxToJqModal/">demonstration</a>. 

<br clear="both" />

<div class="wwwwh">Etc.</div>

<a class="anchor" name="etc"></a>


<br /><br />
<p><em>Support, Bugs, Contributing, Community</em></p>

<dl>

<dt>Support</dt>
<dd>
<ul>
<li>For support, please post to stackoverflow using the jqmodal tag:</li>
<li><a href="http://stackoverflow.com/questions/ask?tags=jqmodal">http://stackoverflow.com/questions/ask?tags=jqmodal</a></li>
</ul>
</dd>

<dt>Issues</dt>
<dd>
<ul>
<li>To report issues, please use the github issue tracker:</li>
<li><a href="https://github.com/briceburg/jqModal/issues">https://github.com/briceburg/jqModal/issues</a></li>
</ul>
</dd>


<dt>Contributing</dt>
<dd>
<ul>
<li>If you would like to contribute themes or ideas please do! This website's code is on github:</li>
<li><a href="https://github.com/iceburg-net/jquery.iceburg.net/tree/master/www-1/jqModal">https://github.com/iceburg-net/jquery.iceburg.net/tree/master/www-1/jqModal</a></li>
</ul>
</dd>


<dt>Community</dt>
<dd>
<ul>
<li>
  jqModal is an open project. <strong>Community embrace is its lifeblood</strong>. Please feel free to help answer questions on <a href="http://stackoverflow.com/questions/tagged/jqmodal">stackoverflow</a> or submit your ideas to our <a href="https://github.com/briceburg/jqModal/issues">issue tracker</a>. 
  <br /><br />
  <em>Your involvement is appreciated!</em>
</li>
</ul>
</dd>
</dl>

<br /><br />


<script type="text/javascript">

// common
$().ready(function() {
   $('div.src a').click(function(){
    $('~ pre',this).toggle();
    return false;
   });
});
</script>

</div>

</body>
</html>