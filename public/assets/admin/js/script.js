$(document).ready(function(){

	$('#check_all').click(function(){
		if($('#check_all').is(':checked')){
			$('.item-checkbox').prop('checked', true);
		} else{
			$('.item-checkbox').prop('checked', false);
		}
	});
	
	tinymce.init({selector: '.tinymce'});
});