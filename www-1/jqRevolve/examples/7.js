$().ready(function(){
	
	// initialize revolver
	$('#example7 div.revolve').jqRevolve({
		next: $('#example7 div.next-button')[0],
		prev: $('#example7 div.prev-button')[0]
	});
	
	// fill revolver content with random Flickr.com imagery
	$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?tags=lemur&format=json&jsoncallback=?",
        function(data){
		  $.each(data.items, function(i,item){
			 $("<img/>").attr("src", item.media.m).appendTo("#example7 div.revolve-content");
            if ( i == 7 ) return false;
          });
		  
		  // refresh example 7's content [sizes to native height]
		  $('#example7 div.revolve').jqrRefresh();
        }
	);
});

	
	