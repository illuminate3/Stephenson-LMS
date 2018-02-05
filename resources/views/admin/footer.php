		</div>
		<script type="text/javascript" src="<?php echo url('../js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo url('../js/jquery-ui.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo url('../js/materialize.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo url('../js/tinymce/tinymce.min.js'); ?>"></script>
		<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
		<script>$('#lfm').filemanager('file');</script>
		<script type="text/javascript" src="<?php echo url('../js/script.js'); ?>"></script>
 <script>
    $( "#modules-list" ).sortable({
		 update: function(){
			$.map($(this).find('.module'),function(el){
				var moduleId = el.id;
				var moduleIndex = $(el).index();
				
				$.ajax({
					url: '/admin/course/module/reorder',
					type: 'POST',
					dataType: 'json',
					data: {moduleId: moduleId, moduleIndex: moduleIndex},
				   headers: {
					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  }
				})
			});
		 }
	 });
  </script>
	</body>
</html>