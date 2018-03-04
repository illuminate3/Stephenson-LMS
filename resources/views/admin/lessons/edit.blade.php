{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
		<nav aria-label="breadcrumb" id="page-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{URL::route('courses.index') }}">
							{{__('messages.courses')}}
						</a>
					</li>

					<li class="breadcrumb-item">
						<a href="{{URL::route('courses.manage', ['module' => $course->id]) }}">
							{{__('messages.manage_course')}}
						</a>
					</li>

					<li class="breadcrumb-item active" aria-current="page">
						{{__('messages.edit_lesson')}}
					</li>
				</ol>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">
					{{__('messages.edit_lesson')}}
				</h1>
			</div>
		</div>


		<div class="container">
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
				<form method="post" class="col-12" action="{{URL::route('course.module.lesson.update',['course' => $course->id, 'module' => $module->id, 'lesson' => $lesson->id])}}" enctype="multipart/form-data">
					<div class="row">
					<div class="col-9">
					<div class="form-group">
						<label for="txtTitle">Título</label>
						<input type="text" class="form-control" value="{{$lesson->title }}" id="txtTitle" placeholder="Título" name="title">
					</div>

					<div class="form-row">
						<div class="form-group col-md-10">
							<label for="inlineFormInputGroup">Url do Vídeo</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">?</div>
								</div>
								<input type="text" value="{{$lesson->video_url }}" class="form-control" id="inlineFormInputGroup" placeholder="Url do Vídeo" name="video_url">
							</div>
						</div>

						<div class="form-group col-md-2">
							<label for="inputPassword4">Tempo</label>
							<input type="time" value="{{$lesson->time }}" class="form-control" id="inputPassword4" name="time">
						</div>
					</div>

							<div class="form-group">
								<textarea type="text" class="form-control tinymce" rows="8" id="txtContent" placeholder="Conteúdo" name="content">
								{{$lesson->content }}
								</textarea>
							</div>

							<div class="form-group">
								<label for="txtTitle">Resumo</label>
								<textarea type="text" class="form-control" id="txtTitle" placeholder="Resumo" name="resume">
								{{$lesson->resume}}
								</textarea>
							</div>

						<input type="hidden" name="author_id" value="{{$lesson->author_id}}">
						<input type="hidden" name="course_id" value="{{$lesson->course_id}}">
						<input type="hidden" name="module_id" value="{{$lesson->module_id}}">
					</div>

					<div class="col-3">
						<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Editar</button>

							<div class="card mt-3">
							  <h5 class="card-header">Thumbnail</h5>
							  <div class="card-body">
									<div class="file-upload">
										<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn"><i class="material-icons">file_upload</i></a>
										<input id="thumbnail" value="{{$lesson->thumbnail }}" type="text" name="thumbnail">
									</div>
							  </div>
							</div>
					</div>
					</div>

						<input type="hidden" value="PUT" name="_method">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
				</form>
			</div>
		</div>
@endsection
