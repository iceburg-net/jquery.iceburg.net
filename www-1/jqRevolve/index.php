<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php define('common-lib', true); require('../common/lib.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>jqRevolve :: Smooth-action Carousel Scrolling</title>
<meta name="author" content="Brice Burgess" />
<meta name="description" content="Carousel Scrolling for jQuery. Pressure sensitive content scroller for JavaScript." />
<meta name="keywords" content="scroll component, carousel, jquery, javascript" />
<link type="text/css" rel="stylesheet" media="all" href="../common/css/common.css" />
<link type="text/css" rel="stylesheet" media="all" href="../common/css/example.css" />

<!-- jqRevolve Dependencies -->
<script type="text/javascript" src="../common/js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="release/jquery.revolve-r2.js"></script>


<script type="text/javascript">$().ready(function(){$('#nav').css('opacity',0.68);});</script>
</head>
<body>

<div id="nav">
<ul>
<li><a href="#who">About</a></li>
<li><a href="#where">Download</a></li>
<li><a href="#how">Usage</a></li>
<li><a href="#examples">Examples</a></li>
<li><a href="#etc">Changes and Issues</a></li>
</div>

<div class="box">

<a class="anchor" name="who"></a>
<div class="wwwwh">Who?</div>

<div id="heading">
jqRevolve <p>Smooth-action Carousel Scrolling with jQuery</p>
</div>

<br />

<div class="wwwwh">What?</div>
<p>
jqRevolve is a plugin for <a href="http://jquery.com/">jQuery</a> to help you add scrolling content areas to your webpage(s).
</p>

<p><em>Features</em>;</p>
<ul>
<li>Horizontal scrolling of arbitrary HTML content (images, iframes, markup, you name it).</li>
<li>Pressure based scrolling</li>
<li>Easy to use and customize</li>
<li>Automatic clip region sizing</li>
<li>Automatic centering of content</li>
</ul>

<div class="wwwwh">Why?</div>
<p>
I wanted a small, easy to understand and modify "carousel" scrolling compontent. There are plenty of <a href="http://www.gmarwaha.com/jquery/jcarousellite/">other</a> <a href="http://sorgalla.com/jcarousel/">carousel-like</a> <a href="http://www.5bosses.com/examples/agile_carousel/jqueryui_example/carousel.html">plugins</a> <a href="http://www.enova-tech.net/lab/jMyCarousel/">out</a> <a href="http://www.dynamicdrive.com/dynamicindex4/stepcarousel.htm">there</a>, however none had the basic auto-sizing and pressure-based scrolling features I needed.
</p>
<p>
If you like my plugins, please consider a dontation to support their development:
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
</form>
</p>

<a class="anchor" name="where"></a>
<div class="wwwwh">When?</div>
<p>
Current Version: <em>2008.11.13 +r2</em>
<br /> &copy; 2008 Brice Burgess - released under both the <a href="http://www.opensource.org/licenses/mit-license.php">MIT</a> and <a href="http://www.gnu.org/licenses/gpl.html">GPL</a> licenses.
</p>

<div class="wwwwh">Where?</div>
<p>
Download the <em><a href="jquery.revolve.js">Development Plugin</a></em> (jquery.revolve.js - 5.42k)
<br />
Download the <em><a href="jquery.revolve.packed.js">Production Plugin</a></em> (jquery.revolve.packed.js - 2.29k)
<br /><br />
&nbsp;&nbsp;** <em>requires</em> [jQuery >= <strong>1.2.0</strong>+]
</p>

<p>
If you need <em>support</em> or have <em>comments</em>, please post to the <a href="http://www.nabble.com/JQuery-f15494.html">jQuery mailing list</a>.
</p>

<a class="anchor" name="how"></a>
<div class="wwwwh">How?</div>

<p><em>Usage</em></p>
To add a revolver to your website you must ...
<dl>

<dt>1. Add Revolver Markup</dt>
<dd>
	Revolvers/Carousels traditionally consist of:
	<br />
	<ol>
		<li>A fixed width (or height) container known as a clip region. This is your "Revolver".</li>
		<li>Forward and Backward buttons that scroll content when clicked</li>
		<li>A content container within the clip region. This is typically wider (or taller) than the clip region.</li>
	</ol>
	<p>
	See the 'HTML' tab of the below examples for reference.
	</p>
	NOTE: The clip region should have relative, fixed, or absolute positioning and MUST have its <strong>overflow</strong> style set to <em>hidden</em>. The content container MUST have absolute posistioning. jqRevolve will <strong>automatically enforce</strong> these <strong>CSS rules</strong>.
</dd>

<dt>2. Initialize Revolver(s)</dt>
<dd>
	Call the $.jqRevolver() method on all revolver(s) added to your page. This will enable the component or alert you of errors encountered. This method will automatically enforce CSS rules [above note].
	<p>
	See the 'Javascript' tab of the below examples for reference.
	</p>
</dd>

<dt>3. Re-Initialize the Revolver whenever content changes</dt>
<dd>
	If a Revolver's content changes, you should refresh using the $.jqrRefresh() method. This will re-calculate the scrolling bounds, as well as
	best size the clip region (if autoSize is enabled).
</dd>
</dl>

<p><em>Methods</em></p>
<dl>
<dt>jqRevolve</dt>
<dd>
 Initialize element(s) as Revolver components. Accepts a parameters object.

 <p class="code">
 $('#revolver').jqRevolve(); <br />
 $('.revolvers').jqRevolve({autoSize:false, content:'div.carouselContent'});
 </p>
</dd>

<dt>jqrRefresh</dt>
<dd>
 	Called when a revolver's content changes. Recalculates scrolling bounds, and best sizes the clip region (if autoSize is enabled).

 <p class="code">
 $('#revolver').jqrRefresh(); <br />
 $('.revolvers').jqrRefresh();
 </p>

</dd>

<p><em>Parameters</em></p>

Parameters allow tailoring the behavior of any jqRevolve to your needs. They are passed on-the-fly as an object to the $.jqRevolve function.

<dl>
<dt>autoSize</dt>
<dd>Resize the clip region to best fit its content. Height is adjusted for horizontal revolvers, width for vertical.
 <p class="pv">(boolean) - default: true</p>
</dd>

<dt>autoCenter</dt>
<dd>Automatically center content in the clip region *IF* it fits within the region.
 <p class="pv">(boolean) - default: true</p>
</dd>

<dt>startPos</dt>
<dd>
 Start position of content in percent (0-100). 100 = all the way forward, 0 = all the way backward.
 <p class="pv">(integer) - default: 0</p>
</dd>

<dt>maxSpeed</dt>
<dd>
  Maximum Scroll Speed (pixels scrolled per animation sequence)
 <p class="pv">(integer) - default: 230</p>
</dd>

<dt>next</dt>
<dd>
 Assigns passed element(s) as next button(s). Clicking scrolls the content forward.
  Accepts;
  <ul>
      <li>(string) A jQuery <a href="http://docs.jquery.com/Selectors">Selector</a></li>
      <li>(object) A jQuery Collection</li>
      <li>(object) A DOM element</li>
  </ul>

 <p class="pv">(mixed) - default: '.revolve-next'</p>
</dd>

<dt>prev</dt>
<dd>
 Assigns passed element(s) as previous button(s). Clicking scrolls the content backward.
  Accepts;
  <ul>
      <li>(string) A jQuery <a href="http://docs.jquery.com/Selectors">Selector</a></li>
      <li>(object) A jQuery Collection</li>
      <li>(object) A DOM element</li>
  </ul>

 <p class="pv">(mixed) - default: '.revolve-prev'</p>
</dd>

<dt>content</dt>
<dd>
  Assigns passed element(s) as content container(s).
  Accepts;
  <ul>
      <li>(string) A jQuery <a href="http://docs.jquery.com/Selectors">Selector</a></li>
      <li>(object) A jQuery Collection</li>
      <li>(object) A DOM element</li>
  </ul>

 <p class="pv">(mixed) - default: '.revolve-content'</p>
</dd>

</dl>

<a class="anchor" name="examples"></a>
<p><em>Examples</em></p>

<div class="example">
1. <em>Defaults</em> - Basic CSS Styling
</div>
<?php exSource(1,array()); ?>

<div class="example">
2. <em>startPos</em> - Specifying a start position
</div>
<?php exSource(2,array()); ?>

<div class="example">
3. <em>autoCenter</em> - Center content if it fits within the clip region
</div>
<?php exSource(3,array()); ?>

<div class="example">
4. <em>autoSize</em> - Set appropriate height of clip region based on content
</div>
<?php exSource(4,array()); ?>

<div class="example">
5. <em>maxSpeed</em> - Set Maximum Speed (pixels scrolled per animation sequence)
</div>
<?php exSource(5,array()); ?>

<div class="example">
6. <em>jqrRefresh method</em> - Update the content area of a jqRevolver (will resize the clip region as necessary. NOTE: Uses the <a href="http://flickr.com">Flickr.com</a> API)
</div>
<?php exSource(6,array()); ?>

<div class="example">
7. <em>Specifing components</em> - Use jQuery <a href="http://docs.jquery.com/Selectors">selectors</a> to specify next, previous, and content element(s).
</div>
<?php exSource(7,array()); ?>


<br clear="both" />

<div class="wwwwh">Etc.</div>

<p><em>Previous Releases</em></p>
All revisions of jqRevolve are available are available <a href="release/">here</a>.

<a class="anchor" name="etc"></a>

<dl>

<dt>Known Issues, Pending Fixes</dt>
<dd>
<ul>
<li>Support Vertical Scrolling</li>
<li>Incorporate Wrap-Around (true Carousel) Feature</li>
<li>Add Callbacks [before scroll, after scroll]</li>
<li>Add a Scroll Bar / Progress Bar</li>
<li>Add mouseOver parameter to automatically start scrolling when next/previous elements are moused over</li>
</ul>
</dd>

<dt>R2 Changes</dt>
<dd>
<ul>
<li>Enhanced scrolling routine - use a sigmoid curve for pressure calculation</li>
<li>Fixed autoSizing under Linux Firefox, Safari.</li>
<li>Code cleanups, enhanced readability</li>
</ul>
</dd>

<dt>R1 Changes</dt>
<dd>
<ul>
<li>Initial Revision</li>
</ul>
</dd>

</dl>

<div class="src">
<div class="js">
<a href="#">Earlier Release Changes</a>

<pre>

</pre>

</div>
</div>

<br /><br />


<p><em>Contributing</em>;</p>
<hr />
If you come up with any cool designs or themes for jqRevolve, please feel free to share! Email your submissions, changes, or bug reports to &lt;bhb@iceburg.net&gt;.

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