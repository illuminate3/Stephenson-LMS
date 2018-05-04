{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Criar Aula</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::route('courses.index')}}">Cursos</a></li>
                <li class="breadcrumb-item "><a href="{{URL::route('courses.manage', ['id' => $course->id])}}">{{$course->title}}</a></li>
                <li class="breadcrumb-item active">Criar Aula</li>
            </ol>
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

			<div class="row">
				<form method="post" class="col-12" action="{{ URL::route('course.module.lesson.store',['course' => $course->id, 'module' => $module->id])}}" enctype="multipart/form-data">
					<div class="row">
					<div class="col-9">
					<div class="form-group">
						<label for="txtTitle">Título</label>
						<input type="text" class="form-control" id="txtTitle" placeholder="Título" name="title">
					</div>

					<div class="form-row">
						<div class="form-group col-md-10">
							<label for="inlineFormInputGroup">Url do Vídeo</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">?</div>
								</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Url do Vídeo" name="video_url">
							</div>
						</div>

						<div class="form-group col-md-2">
							<label for="inputPassword4">Tempo</label>
							<input type="time" class="form-control" id="inputPassword4" name="time">
						</div>
					</div>

							<div class="form-group">
								<textarea type="text" class="form-control tinymce" rows="8" id="txtContent" placeholder="Conteúdo" name="content"></textarea>
							</div>

							<div class="form-group">
								<label for="txtTitle">Resumo</label>
								<textarea type="text" class="form-control" id="txtTitle" placeholder="Resumo" name="resume"></textarea>
							</div>

						<input type="hidden" name="author_id" value="{{ Auth::user()->id}}">
						<input type="hidden" name="course_id" value="{{ $course['id']}}">
						<input type="hidden" name="module_id" value="{{ $module['id']}}">
					</div>

					<div class="col-3">
            @include('admin.templates.widgets.add_button')

            @include('admin.templates.widgets.thumbnail')
					</div>
					</div>

					<input type="hidden" name="_token" value="{{ csrf_token()}}">
				</form>
			</div>
		</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/admin/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/tinymce/config.js')}}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>$('#lfm').filemanager('file');</script>
@endsection
