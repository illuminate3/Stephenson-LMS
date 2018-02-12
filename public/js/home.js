$('#depoiments').cycle({ 
	fx:    'scrollLeft', 
	delay: -1000,
	timeout: 0, 
	pager:  '#depoiments-slider', 
	pagerAnchorBuilder: function(idx, slide) { 
		return '<a href="#"><div>' + jQuery(slide).children("h3").eq(0).text() + '</div></a>'; 
	} 
});