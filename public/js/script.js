$( document ).ready(function(){
	$(".button-collapse").sideNav();
	$('.dropdown-button').dropdown({ belowOrigin: true, alignment: 'right' });
	$('.dropdown-menu-item').click(function(){
		if($(this).find('ul').is(':visible')){
			$(this).find('ul').slideUp();
		} else{
			$('.dropdown-menu-item ul').slideUp();
			$(this).find('ul').slideDown();
		}
	});
});

	$('#depoiments').cycle({ 
		 fx:    'scrollLeft', 
		 delay: -1000,
		 timeout: 0, 
		 pager:  '#depoiments-slider', 
    pagerAnchorBuilder: function(idx, slide) { 
        // return selector string for existing anchor 
       return '<a href="#"><div>' + jQuery(slide).children("h3").eq(0).text() + '</div></a>'; 
    } 
		
	});