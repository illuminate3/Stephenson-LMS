{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <div class="modal" tabindex="-1" role="dialog" id="add-material-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

        </div>
      </div>
    </div>

    <div class="pages-navigation">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{URL::route('courses.index')}}">Cursos</a></li>
          <li class="breadcrumb-item active">Gerenciar Curso</li>
      </ol>
    </div>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
          <h3 class="text-primary">{{$course->title}}</h3>
        </div>

        <div class="col-md-7">
          <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" href="{{URL::route('courses.manage', ['course' => $course->id])}}">Gerenciar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" >Mensagens</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" >Estatísticas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::route('courses.edit', ['course' => $course->id])}}">Editar</a>
            </li>
          </ul>
        </div>
    </div>
    <!-- End Bread crumb -->

		<div class="container-fluid">
    	<?php
    		if (session('success')){
    			if (session('success')['success'] == false){
    				echo '<div class="alert alert-danger" role="alert">' . session('success')['messages'] . '</div>';
    			} else {
    				echo '<div class="alert alert-success" role="alert">' . session('success')['messages'] . '</div>';
    			}
    		}
    	?>

    	@if(count($course->getModules) > 0)
      	<div id="modules-list">
      		@php $modules = $course->getModules @endphp
          @foreach ($modules as $module)
      		<div class="card module" id="module-{{ $module->id }}">
            <div class="card-header" id="module-heading-{{ $module->id }}">
              <div class="drag-module"><i class="fa fa-bars"></i></div>
              <h5>
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-{{ $module->id }}" aria-expanded="false" aria-controls="collapse-{{ $module->id }}">
                  {{ $module->name }}
                </button>
              </h5>

              <div class="module-actions">
                <div class="action-buttons" role="group">
                  <div class="action">
                    <a href="#">
                      <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                    </a>
                  </div>

                  <div class="action">
                    <form method="post" action="{{ URL::route('course.module.destroy', ['course_id' => $course->id, 'module_id' =>  $module['id']])}}">
                      <button type="submit" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                      <input type="hidden" value="DELETE" name="_method">
                      <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    </form>
                  </div>
                </div>
              </div>
      			</div>
      			<div id="collapse-{{ $module->id }}" class="collapse" aria-labelledby="module-heading-{{ $module->id }}" data-parent="#modules-list">
      				<div class="card-body">
      					@if(count($module->getLessons) > 0)
      					<div class="lessons-list">
      						@php $lessons = $module->getLessons @endphp
                  @foreach ($lessons as $lesson)
      						<div class="card lesson" id="lesson-{{ $lesson->id }}">
      							<div class="card-header" id="lesson-heading-{{ $lesson->id}}">
      								<div class="row">
      									<div class="col-1 drag-lesson"><i class="fa fa-bars"></i></div>
      									<h5 class="mb-0 col-8">
      										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lesson-collapse-{{ $lesson->id}}" aria-expanded="false" aria-controls="collapseTwo">
      											{{ $lesson->title }}
      									   </button>
      									</h5>

      									<div class="lesson-actions col-3">
      										<div class="action-buttons" role="group" aria-label="Button group with nested dropdown">
                            <div class="action">
                              <a href="{{ URL::route('course.module.lesson.edit',['course_id' => $course->id, 'module_id' => $module->id, 'lesson_id' => $lesson->id])}}">
        												<button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
        											</a>
                            </div>

                            <div class="action">
        											<form method="post" action="{{ URL::route('course.module.lesson.destroy', ['course_id' => $course->id, 'module_id' =>  $module->id, 'lesson_id' => $lesson->id])}}">
        												<button type="submit" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
        												<input type="hidden" value="DELETE" name="_method">
        												<input type="hidden" name="_token" value="{{ csrf_token()}}">
        											</form>
                            </div>

                            <div class="action">
        											<div class="btn-group" role="group">
        												<button id="add-material-{{ $lesson->id}}" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        												Material
        											 </button>
        												<div class="dropdown-menu" aria-labelledby="add-material-{{ $lesson->id}}">
        													<a class="dropdown-item" class="add-material" data-toggle="modal" data-target="#add-material-modal" data-mtype="file" href="#">Arquivo</a>
        													<a class="dropdown-item" class="add-material" data-toggle="modal" data-target="#add-material-modal" data-mtype="image" href="#">Imagem</a>
        													<a class="dropdown-item" class="add-material" data-toggle="modal" data-target="#add-material-modal" data-mtype="video" href="#">Vídeo</a>
        													<a class="dropdown-item" class="add-material" data-toggle="modal" data-target="#add-material-modal" data-mtype="note" href="#">Nota</a>
        													<a class="dropdown-item" class="add-material" data-toggle="modal" data-target="#add-material-modal" data-mtype="poll" href="#">Enquete</a>
        												</div>
        											</div>
                            </div>
      										</div>
      									</div>
      								</div>
      							</div>
      							<div id="lesson-collapse-{{ $lesson->id}}" class="collapse" aria-labelledby="lesson-heading-{{ $lesson->id}}" data-parent=".lesson-list">
      								<div class="card-body">
      									@if(count($lesson->getMaterials) > 0)
      									<div class="materials row">
      										@php $materials = $lesson->getMaterials @endphp
                          @foreach ($materials as $material)
                          @php $material_meta = unserialize($material->meta) @endphp
      											<div class="material col-4">
                                <div class="card">
                                    <?php switch ($material_meta['material_type']){ case ("note"): ?>
                                      <div class="card-body">
                                        <div class="material-content">
                                          {{$material_meta['content']}}
                                        </div>
                                        <h5 class="card-title"><i class="fa fa-sticky-note"></i> {{$material_meta['title']}}</h5>
                                      </div>
                                    <?php break; case ("file"): ?>
                                      <div class="card-body">
                                        <div class="material-content">
                                          {{$material_meta['content']}}
                                        </div>
                                        <h5 class="card-title"><i class="far fa-file"></i> {{$material_meta['title']}}</h5>
                                      </div>
                                    <?php break; case ("image"): ?>
                                      <div class="card-body">
                                        <div class="material-content">
                                          <img src="{{$material_meta['content']}}">
                                        </div>
                                        <h5 class="card-title"><i class="far fa-images"></i> {{$material_meta['title']}}</h5>
                                      </div>
                                    <?php break; case ("video"): ?>
                                      <div class="card-body">
                                        <div class="material-content">
                                          {{$material_meta['content']}}
                                        </div>
                                        <h5 class="card-title"><i class="far fa-play-circle"></i> {{$material_meta['title']}}</h5>
                                      </div>
                                    <?php break;} ?>
                                </div>
      											</div>
      										@endforeach
      									</div>
                        @else
                          <p>Nenhum material cadastrado.</p>
                        @endif
      								</div>
      							</div>
      						</div>
                  @endforeach
      					</div>
                @else
                  Nenhuma aula cadastrada
      					@endif
      					<a class="btn btn-primary btn-lg btn-block mt-3" href="{{ URL::route('course.module.lesson.create',['course_id' => $course->id, 'module_id' => $module->id])}}">
      						Criar Aula para este Módulo
      					</a>
      				</div>
      			</div>
      		</div>
          @endforeach
      	</div>
    	@else
    	   <p>Nenhum módulo criado, crie um usando o formulário abaixo.</p>
    	@endif
  		<div class="card">
  			<div class="card-body">
  				<form class="form-inline" method="post" action="{{ URL::route('course.module.store',['course_id' => $course->id])}}">
  					<div class="form-group">
  						<label for="inlineFormInputName2">Criar um Módulo</label>
  						<input type="text" class="form-control mx-sm-3" id="inlineFormInputName2" placeholder="Nome do Módulo" name="name">
  					</div>
  					<input type="hidden" name="course_id" value="{{ $course['id'] }}">
  					<input type="hidden" name="_token" value="{{ csrf_token()}}">
  					<button type="submit" class="btn btn-primary sm-3">Criar</button>

  				</form>
  			</div>
  		</div>
    </div>
@endsection

@section('scripts')
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
@endsection
