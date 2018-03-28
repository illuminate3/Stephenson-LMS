<!-- End Wrapper -->
<!-- All Jquery -->
<script src="{{asset('assets/admin/js/lib/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/jquery-ui.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/admin/js/pooper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('assets/admin/js/jquery.slimscroll.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('assets/admin/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('assets/admin/js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('assets/admin/js/custom.min.js')}}"></script>

<!-- Necessário nas páginas com upload -->
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>$('#lfm').filemanager('file');</script>

<!-- Necessário nas páginas com editor de texto -->
<script type="text/javascript" src="{{ asset('assets/admin/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/tinymce/config.js')}}"></script>

<!-- Necessário nas páginas na página de gerenciamento de curso -->
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
