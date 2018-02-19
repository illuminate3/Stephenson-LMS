
	<div class="container">
		<footer>
			<p>Stephenson - Muito obrigado por nos escolher <3</p>
		</footer>
	</div>


		<script type="text/javascript" src="{{ url('../js/jquery-3.2.1.min.js')}}"></script>
		<script type="text/javascript" src="{{ url('../js/jquery-ui.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{ url('../js/tinymce/tinymce.min.js')}}"></script>
		<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
		<script>$('#lfm').filemanager('file');</script>
		<script type="text/javascript" src="{{ url('../js/script.js')}}"></script>
		<script>
			 $( "#modules-list" ).sortable({
				 handle: '.drag-module',
				 update: function(){
					$.map($(this).find('.module'),function(el){
						var moduleId = el.id.substr(7);
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
						var lessonId = el.id.substr(7);
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


			$('#add-material-modal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('mtype') // Extract info from data-* attributes
				var lesson = button["0"].parentNode.parentNode.firstElementChild.id.substr(13)

				$.ajax({
					url:'{{ URL::to('/admin/lesson')}}/' + lesson + '/form/add_' + recipient,
					headers: {
						 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: "GET", // not POST, laravel won't allow it
					success: function(data){
					$data = $(data); // the HTML content your controller has produced
						$('#add-material-modal .modal-dialog .modal-content').html($data);
					}
				});
			});

			$('#add-material-modal').on('hidden.bs.modal', function (e) {
 				$('#add-material-modal .modal-dialog .modal-content').empty();
			});
		</script>
