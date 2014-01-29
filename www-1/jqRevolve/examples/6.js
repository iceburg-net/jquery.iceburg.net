$().ready(function(){
	$('#example6').jqRevolve({autoSize: true});
	
	$('#updateExample6').click(function(){
		
		// Grab random images from Flickr.com
		$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?tags="+getTag()+"&format=json&jsoncallback=?",
        function(data){
          
		  // create new content placeholder
		  var newContent = '';
		  
		  $.each(data.items, function(i,item){
			newContent += '<img src="'+item.media.m+'" /> &nbsp;'
            if ( i == 5 ) return false;
          });
		  
		  // update example 6 carousel with newContent
		  $('#example6').jqrRefresh(newContent);
		  
        });

	});
	
	// random tags for Flickr Service
	var tags = ['kitten','goldfish','puppy'],i=0;
	function getTag(){
		if(i == 3)
			i = 0;
		return tags[i++];
	}
});






