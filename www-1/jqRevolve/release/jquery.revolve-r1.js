/**
 * jqRevolve - jQuery plugin for smooth-action carousel navigation
 * 	(http://dev.iceburg.net/jquery/jqRevolve/)
 *
 * Copyright (c) 2008 Brice Burgess <bhb@iceburg.net>
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * 
 * @author: Brice Burgess
 * @version: 2008.10.15 +r1
 * @requires: jQuery v1.2 or later
 */

;(function($) {
$.fn.jqRevolve = function(o) {
    o = $.extend({
        next: '.revolve-next',			// element or selector that scrolls forward when clicked
        prev: '.revolve-prev',			// element or selector that scrolls backward when clicked
        content: '.revolve-content',	// element or selector indicating carousel content
        autoSize: true,					// automatically sizes the clip region based on content [height if horizontal, width if vertical]
    	autoCenter: true,				// if content is smaller than the clip region, center it.
		startPos: 0,					// start position in percent (100 = all the way forward, 0 = all the way backward)
		maxSpeed: 230					// maximum pixels/animationPeriod scroll speed
	}, o || {});

    return this.each(function() {

    	// ensure next button, prev button, and content exist
    	JR.sane = true;
    	var content = exists(o.content,this,'content'),
    		next = exists(o.next,this,'next'),
    		prev = exists(o.prev,this,'prev');

    	// return if:
    	//    + this component has already been initialized (watch memory usage)
    	//    + failed sanity checks
    	if(this._jqRevolve || !JR.sane)
    		return;

    	// increment serial
    	S++;

    	// store settings and content element in globally accessible hash
    	H[S]={
    		content: content,
    		pressure: 1,
			maxSpeed: o.maxSpeed,
			autoSize: o.autoSize,
    		center: o.autoCenter,
			start: o.startPos
    	};

		// tag elements with hash reference
    	tag(this,next,prev);

		// initialize content
		$(this).jqrRefresh();

		// bind functions to fwd and bkwd buttons
		next.mousedown(function(){ JR.start(H[S], '-='); });
		prev.mousedown(function(){	JR.start(H[S], '+='); });

    });
};

// refreshes content - will load new content if passed
$.fn.jqrRefresh = function(newContent){
	return this.each(function(){
		var h = H[this._jqRevolve],
			size = h.content.width(),
			view = $(this).width();

		if(newContent)
			h.content.html(newContent);

		// autosize the clip area / "viewport"
		if (h.autoSize) {
			var x = 9999,
				y = h.content.clone(),
				z = $('<div />').css({
				position: 'absolute',
				top: -x,
				left: -x,
				width: x
				});
			$('body').append(z.append(y));


			// encourage 'native' dimensions of clone, recalculate size
			size = y.height('auto').width('auto').width();

			// set height of clip region to 'native' height of content
			$(this).height(y.height());

			// cleanup
			z.remove();
		}

		// calculate the minimum/maximum X axis 
		h.max = size-view;

		// calculate the start offset (center content if requested)
		var pos = (h.center && size < view) ? 50 : h.start;
		h.content.css({
			left: -((h.max * pos) / 100) + 'px',
			width: size + 999 // prevents clipping of slightly out-of-bounds ("overflown") content in FF
		});
	});
};

$.jqRevolve = {
	hash: {},
	scroll: function() {
		// shortcuts
		var h = JR.cur.hash,
			p = h.pressure,
			c = h.content,
			dir = JR.cur.inc,
			pos = parseInt(c.css('left'));

		// abort rules
		if (!p || (pos > 0 && dir == '+=') || (Math.abs(pos) >= h.max && dir == '-=')) {
			c.stop();
			return;
		}

		// adjust pressure (speed of scroll) according to how long the mouse has been down
		if(p < 30)
			p += p;
		else if(p < h.maxSpeed)
			p += 7;
		h.pressure = p;

		// turn the carousel
		c.queue('fx',[]).animate({left: dir+p})
		setTimeout(JR.scroll,120);
	},
	start: function(h, i) {

		// globally register scrolling direction and hash object
		JR.cur = {hash: h, inc: i};

		// reset pressure
		h.pressure = 1;

		// start carousel scrolling
		JR.scroll();

		// listen for mouseup event, stop animation
		$().one('mouseup',function(){ h.pressure = 0; });
	}
};

// helper functions

// determines if passed selector/element (s) exists. uses context (e) if string selector.
function exists(s,e,d) {
	var ret = (typeof s == 'string') ? $(s,e) : $(s);
	if (ret.length == 0) {
		alert('jqRevolve: could not find '+d+' element!');
		JR.sane = false;
	}
	return ret;
};

// adds expando to elements passed (referencing hash)
function tag() {
	var i = arguments.length; while (i--) {
		$(arguments[i])[0]._jqRevolve = S;
	}
};

//shortcuts to reduce code size
var S=0, // serial
	JR=$.jqRevolve,
	H=JR.hash; // hash

})(jQuery);