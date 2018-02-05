<script type="text/javascript" src="<?php echo url('js/jquery-3.2.1.min.js'); ?>"></script>
<script>
	$('.module-name').click(function(){
		if($(this).parent().parent().find('.module-body').is(':visible')){
			$(this).parent().parent().find('.module-body').slideUp();
		} else{
			$('.module-body').slideUp();
			$(this).parent().parent().find('.module-body').slideDown();
		}
	});
</script>	
</body>
</html>