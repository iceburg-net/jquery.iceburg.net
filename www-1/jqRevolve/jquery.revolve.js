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
 * @version: 2008.11.13 +r2
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
		maxSpeed: 100					// maximum pixels/animationPeriod scroll speed
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
    	if(this._jqRev || !JR.sane)
    		return;

    	// increment serial
    	S++;

		// enforce correct positioning and style
		$(this).css('overflow','hidden');
		css(this,'relative');
		css(content,'absolute');

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
		next.mousedown(function(){ JR.start(H[this._jqRev], '-='); });
		prev.mousedown(function(){ JR.start(H[this._jqRev], '+='); });
    });
};

// refreshes content - will load new content if passed
$.fn.jqrRefresh = function(newContent){
	return this.each(function(){
		var s = this._jqRev,	// serial
			h = H[s],			// hash
			e = $(this)			// revolver element (aka "clip region")

		if(newContent)
			h.content.html(newContent);

		// determine 'natural' dimensions of content via clone
		var clone = h.content.clone().css({
			position: 'absolute',
			top: -9999,
			left: -9999,
			height: 'auto',
			width: 'auto'
		});
		$('body').append(clone);

		// resize clip region and calculate bounds
		(function resize(){
			if (h.autoSize) {
				var loaded = true;
				// ensure all content images are loaded before resizing
				$('img',h.content).each(function(){
					if (
						(this.naturalWidth && this.naturalWidth == 0) // FF
						|| !this.complete // IE
						|| (clone.height() < this.scrollHeight) // case for Safari + Linux FF where native clone height is not immediately accurate
					) {
						setTimeout(resize,300);
						loaded = false;
						return false;
					}
				});

				if (loaded)
					e.height(clone.height());
			}

			// calculate scrolling bounds and start offset
			var size = clone.width(),
				view = e.width()
				pos = (h.center && size < view) ? 50 : h.start;

			h.max = size-view;
			h.content.css({
				left: -((h.max * pos) / 100) + 'px',
				width: size + 999 // additional padding prevents clipping of out-of-bounds content in FF
			});

			// cleanup
			if(!h.autoSize || loaded)
				clone.remove();
		})();
	});
};

$.jqRevolve = {
	hash: {},
	start: function(h, dir) {
		var step = 150			// step increment (in milleseconds)
			total = 4500,		// ceiling target in milleseconds [reach maxSpeed in 4.5 seconds]
			duration = step,	// track number of steps
			halt = false;		// abort when true

		function stop(){
			halt = true;
		};

		// listen for mouseup event, stop animation
		$().one('mouseup',stop);

		(function scroll(){
			var p = h.maxSpeed,
				pos = parseInt(h.content.css('left'));

			// abort
			if(halt || (pos >= 0 && dir == '+=') || (Math.abs(pos) >= h.max && dir == '-='))
				return h.content.queue('fx',[]);

			// apply polynomial pressure scaling
			if (duration < total) {
				var f = duration / total,
				p = parseInt(h.maxSpeed * ((3 - 2 * f) * f * f));
			}

			// snap to bounds
			var newPos = (dir == '+=') ? pos+p : pos - p;
			if ((dir == '+=' && newPos > 0) || (dir == '-=' && Math.abs(newPos) >= h.max)) {
				p = (dir == '+=') ? 0 - pos : h.max - Math.abs(pos);
				halt = true;
			}

			// increase duration
			duration += step;

			// scroll content
			h.content.queue('fx',[]).animate({left: dir+p},step+5);

			// repeat
			setTimeout(scroll,step);
		})();
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
		$(arguments[i])[0]._jqRev = S;
	}
};

// enforces css positioning
function css(e,p){
	if($(e).css('position') == 'static')
		$(e).css('position',p);
};

//shortcuts to reduce code size
var S=0, // serial
	JR=$.jqRevolve,
	H=JR.hash; // hash

})(jQuery);