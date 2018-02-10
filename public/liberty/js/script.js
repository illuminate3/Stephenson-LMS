$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
	$('.dropdown-button').dropdown({ belowOrigin: true, alignment: 'right' });
		
	$('.module-name').click(function(){
		if($(this).parent().parent().find('.module-body').is(':visible')){
			$(this).parent().parent().find('.module-body').slideUp();
		} else{
			$('.module-body').slideUp();
			$(this).parent().parent().find('.module-body').slideDown();
		}
	});
});