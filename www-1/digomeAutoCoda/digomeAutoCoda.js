/**
 * DigomeAutoCoda +r3 (c) Brice Burgess 2009-2014
 */

;(function($) {
$.fn.digomeAutoCoda = function(o) {
    
	o = $.extend({
		singlePage: false,				// e.g. read-more link after first page
		singlePageNavText: 'read more',
		pager: 'below',
		pagerClass: 'autocoda-pager',
		pageHeight: 400,
		pageWidth: 'auto',
		pageClass: 'autocoda-page',
		urlFragmentPrefix: 'page-',
		transitionOut: AC.transitionOut,
		transitionIn: AC.transitionIn,
		highlightNav: AC.highlightNav
	}, o || {});
	
	return this.each(function(){
	
		// initialization routines
		var content = $(this),
			container = $('<div />').css({
				position: 'absolute',
				left: -6000,
				top: -6000,
				width: (o.pageWidth == 'auto') ? 
					content.innerWidth() : o.pageWidth
			}).appendTo('body'),
			heightOffset = 0,
			pageElements = [],
			pageCount = 0,
			makePage = function(){$(pageElements).wrapAll('<div class="' + o.pageClass + '">'); pageCount++;};
		
		// content traversal (automatic creation of pages)
		content.contents().each(function(){
			container.append(this);
			pageElements.push(this);
	
			if(container.height() - heightOffset >= o.pageHeight)
			{
				if(!o.singlePage || pageCount == 0)
				{
					makePage();
					pageElements = [];
					heightOffset = container.height();
				}
			}
		});
		if(pageElements.length > 0)
			makePage();
		
		// transfer pages to original content frame
		content.append(container.children());
		container.remove();


		
		// create multi-page paginator
		var paginator = $('<div class="' + o.pagerClass + '"><ul></ul></div>'),
			ul = $('ul',paginator);
		
		if(o.singlePage)
		{
			ul.append('<li style="display: none;">1</li><li class="autocoda-read-more">' + o.singlePageNavText + '</li>');
		}
		else
		{
			for(var i = 1; i <= pageCount; i++)
			{
				ul.append('<li>' + i + '</li>');
			}
			
			ul.prepend('<li class="autocoda-prev">prev</li>');
			ul.append('<li class="autocoda-next">next</li>');
		}
			
		ul[0]._autocoda = {
			currentPage: null,
			container: content,
			pageCount: pageCount,
			config: o
		};
		
		$('li',ul).click(AC.pageClick);
		
		
		// draw paginator
		switch(o.pager)
		{
			case 'below':
			default:
				content.after(paginator);
				break;
		}
		
		// register paginator's navigation for this fragment prefix
		if ($.inArray(o.urlFragmentPrefix, AC.hashMap) < 0) 
		{
			AC.hashNav[AC.hashMap.push(o.urlFragmentPrefix) - 1] = ul;
		}
		
		
		if(o.singlePage)
		{
			$('li:eq(0)',ul).click();
		}
		else
		{
			// examine URL fragment	| trigger first page
			var hash = location.hash.replace('#',''),
				prefix = hash.replace(/\d+$/,''),
				page = (prefix == o.urlFragmentPrefix) ? 
					hash.match(/\d+$/) : 1;
					
			AC.fragEmpty = (hash == '') ? true : false;
			$('li:eq('+ page + ')',ul).click();
		}
		
	});
};

var AC = {
	// hashes for working with fragment history
	hashNav: [],
	hashMap: [],
	
	// paginator click event
	pageClick: function(){
		
		// o = options
		// i = clicked page index
		
		var o = $(this).parent()[0]._autocoda,
			i = $(this).prevAll('li:not(.autocoda-prev)').length;
		
		if($(this).is('.autocoda-prev'))
		{
			if(o.currentPage > 0)
				$('li:eq(' + (o.currentPage) + ')',this.parentNode).click();
			return false;
		}
		
		if($(this).is('.autocoda-next'))
		{
			// skip two (by default) to avoid initial li element
			var skip = (o.currentPage === null) ? 1 : 2;
			
			if(o.currentPage < (o.pageCount - 1))
				$('li:eq(' + (o.currentPage + skip) + ')',this.parentNode).click();
			return false;
		}
		
		if(o.config.singlePage)
		{
			o.config.transitionIn($('div.' + o.config.pageClass + ':eq(' + i + ')',o.content));
		}
		else
		{
		
			// transition content
			if(o.currentPage !== null)
				o.config.transitionOut($('div.' + o.config.pageClass + ':eq(' + o.currentPage + ')',o.content));
			
			o.config.transitionIn($('div.' + o.config.pageClass + ':eq(' + i + ')',o.content))
			
			// set URL fragment
			AC.setFragment(o.config.urlFragmentPrefix + (i+1))
		}
	
		// highlight clicked page / list item
		o.config.highlightNav($(this));
		
		// remember page
		o.currentPage = i;
	
		return false;
	},
	
	setFragment: function(hash)
	{	
		var newHash = hash,
			currentHash = location.hash.replace('#','');
			
		if(newHash == currentHash)
			return;

		location.hash = hash;
		
		this.watchFragment();
	},
	

	watchFragment: function()
	{
		if(this.watching)
			return false;
		
		var oldHash = location.hash.replace('#','');
		
		(function watch(){
			var newHash = location.hash.replace('#','');
			
			if(oldHash != newHash)
			{
				if(newHash == '' && AC.fragEmpty)
				{
					history.go(-1);
				}
				
				// see if this is a valid prefix
				var prefix = newHash.replace(/\d+$/,''),
					page = newHash.match(/\d+$/),
					nav = AC.hashNav[$.inArray(prefix, AC.hashMap)];
					
					
				if(nav && nav.length && nav[0]._autocoda.currentPage != (page -1))
				{
					$('li:eq('+ page + ')',nav).click();
				}
				
				oldHash = newHash;
			}
			AC.watching = true;
			setTimeout(watch, 300);
		})();
		
				
	},
	watching: false,
	
	// OVERRIDABLE
	// FUNCTIONS
	
	transitionOut: function(content)
	{
		content.slideUp();
	},
	
	transitionIn: function(content)
	{
		content.slideDown();
	},
	
	highlightNav: function(li)
	{
		li.siblings().removeClass('autocoda-active');
		li.addClass('autocoda-active');
	}
	
};

})(jQuery);