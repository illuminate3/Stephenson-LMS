		</div>
		<script type="text/javascript" src="<?php echo url('../js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo url('../js/jquery-ui.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo url('../js/materialize.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo url('../js/admin/tinymce/tinymce.min.js'); ?>"></script>
		<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
		<script>$('#lfm').filemanager('file');</script>
		<script type="text/javascript" src="<?php echo url('../js/admin/script.js'); ?>"></script>
		<script>
			 $( "#modules-list" ).sortable({
				 handle: '.drag-module',
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
			
			$( ".lessons-list" ).sortable({
				handle: '.drag-lesson', 
					update: function(){
					$.map($(this).find('.lesson'),function(el){
						var lessonId = el.id;
						var lessonIndex = $(el).index();

						$.ajax({
							url: '/admin/course/module/lesson/reorder',
							type: 'POST',
							dataType: 'json',
							data: {lessonId: lessonId, lessonIndex: lessonIndex},
							headers: {
							 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						  }
						})
					});
				 }
			});

			$('.modal').modal({
				ready: function(trigger, model) { // Callback for Modal open. Modal and trigger parameters available.
					var id = trigger["0"].M_Modal.openingTrigger["0"].id;
					var lesson = model["0"].parentNode.parentNode.parentNode.id;
					$.ajax({
						url:'<?php echo URL::to('/admin/lesson'); ?>/' + lesson + '/form/' + id,
						headers: {
							 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						type: "GET", // not POST, laravel won't allow it
						success: function(data){
						$data = $(data); // the HTML content your controller has produced
						$('#form-modal').html($data);    
						}
					});

				},
				complete: function() { $('#form-modal').empty(); } // Callback for Modal close
				}
			);
		</script>
	</body>
</html>