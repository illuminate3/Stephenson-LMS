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
	
	$('.module-name').click(function(){
		if($(this).parent().parent().find('.module-body').is(':visible')){
			$(this).parent().parent().find('.module-body').slideUp();
		} else{
			$('.module-body').slideUp();
			$(this).parent().parent().find('.module-body').slideDown();
		}
	});
	
	$('#check_all').click(function(){
		if($('#check_all').is(':checked')){
			$('.item-checkbox').prop('checked', true);
		} else{
			$('.item-checkbox').prop('checked', false);
		}
	});
	
	$('.edit-button').click(function(){
		$(this).parent().find('.module-name').hide();
		$(this).parent().find('.module-edit').show();
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