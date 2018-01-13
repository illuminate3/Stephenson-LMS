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
	
	  $('.chips-initial').material_chip({
    data: [{
      tag: 'Apple',
    }, {
      tag: 'Microsoft',
    }, {
      tag: 'Google',
    }],
  });
	  $('.chips-placeholder').material_chip({
    placeholder: 'Enter a tag',
    secondaryPlaceholder: '+Tag',
  });
	
	$('select').material_select();

  tinymce.init({
    selector: '.tinymce'
  });

});