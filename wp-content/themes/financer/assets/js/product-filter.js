

	howMany = 12;
	listButton = jQuery('button.list-view');
	gridButton = jQuery('button.grid-view');
	wrapper = jQuery('div.wrapper');
	
	listButton.on('click',function(){
		
	  gridButton.removeClass('on');
	  listButton.addClass('on');
	  wrapper.removeClass('grid').addClass('list');
	  
	});
	
	gridButton.on('click',function(){
		
	  listButton.removeClass('on');
	  gridButton.addClass('on');
	  wrapper.removeClass('list').addClass('grid');
	  
	});


