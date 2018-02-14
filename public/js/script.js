$(document).ready(function(){

	$('#check_all').click(function(){
		if($('#check_all').is(':checked')){
			$('.item-checkbox').prop('checked', true);
		} else{
			$('.item-checkbox').prop('checked', false);
		}
	});
	
	$('#sidebar').stickySidebar({
		 topSpacing: 0,
		 bottomSpacing: 0
	});
	
	tinymce.init({selector: '.tinymce'});
});