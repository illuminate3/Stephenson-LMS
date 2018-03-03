{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
		<nav aria-label="breadcrumb" id="page-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ URL::route('courses.index')}}">
							{{ __('messages.courses')}}
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						{{ __('messages.edit_course')}}
					</li>
				</ol>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">
					{{ __('messages.edit_course')}}
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
				<form  class="col-12" method="post" action="{{ URL::route('courses.update', ['course_id' => $course->id])}}" enctype="multipart/form-data">
					<div class="row">
					<div class="col-9">
							<div class="form-group">
								<label for="txtTitle">Título</label>
								<input type="text" value="{{ $course->title}}" class="form-control" id="txtTitle" placeholder="Título" name="title">
							</div>

							<div class="form-group">
								<textarea type="text" class="form-control tinymce" rows="8" id="txtContent" placeholder="Conteúdo" name="description">
									{{ $course->description}}
								</textarea>
							</div>

							<div class="form-group">
								<label for="txtTitle">Resumo</label>
								<textarea type="text" class="form-control" id="txtTitle" placeholder="Resumo" name="resume">
									{{ $course->resume}}
								</textarea>
							</div>


						<input type="hidden" name="author_id" value="{{ Auth::user()->id}}">
					</div>

						<div class="col-3">

							<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Editar</button>

							<div class="card mt-3">
							  <h5 class="card-header">Categoria</h5>
							  <div class="card-body">
									<select name="category_id">
										<option value="{{ ($atual_category == NULL) ? "0" : $atual_category['id']}}" selected>{{ ($atual_category == NULL) ? "Sem Categoria" : $atual_category['name']}}</option>
										@foreach ($categories as $category)
										<option value="{{ $category['id']}}">{{ $category['name']}}</option>
										@endforeach
									</select>
							  </div>
							</div>

							<div class="card mt-3">
							  <h5 class="card-header">Capa</h5>
							  <div class="card-body">
									<div class="file-upload">
										<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn"><i class="material-icons">file_upload</i></a>
										<input id="thumbnail" value="{{ $course->cover}}" type="text" name="cover">
									</div>
							  </div>
							</div>
						</div>
					</div>

					<input type="hidden" value="PUT" name="_method">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
				</form>
			</div>
		</div>
@endsection
