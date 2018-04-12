{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section("styles")
  <link href="{{asset('assets/admin/css/bootstrap-tagsinput.css')}}" rel="stylesheet">
@endsection

@section('viewMain')
    @parent
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Editar Postagem</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::route('posts.index')}}">Postagens</a></li>
                <li class="breadcrumb-item active">Editar Postagem</li>
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
				<form class="col-12" method="post" action="{{URL::route('posts.update', ['post_id' => $post->id])}}" enctype="multipart/form-data">
					<div class="row">
					<div class="col-9">

							<div class="form-group">
								<label for="txtTitle">Título</label>
								<input value="{{$post->title}}" type="text" class="form-control" id="txtTitle" placeholder="Título" name="title">
							</div>

							<div class="form-group">
								<textarea type="text" class="form-control tinymce" rows="8" id="txtContent" placeholder="Conteúdo" name="content">
								{{$post->content}}
								</textarea>
							</div>

							<div class="form-group">
								<label for="txtTitle">Resumo</label>
								<textarea class="form-control" id="txtTitle" placeholder="Resumo" name="resume">
								{{$post->resume}}
								</textarea>
							</div>

						<input type="hidden" name="author_id" value="{{Auth::user()->id}}">
					</div>

						<div class="col-3">

							<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Editar</button>

							<div class="card mt-3">
							  <h5 class="card-header">Tags</h5>
							  <div class="card-body">
                  <p>Digite as tags separadas por vírgula.</p>
    						  <input type="text" data-role="tagsinput" placeholder="Adicionar +" name="tags" value="{{$post->tags}}">
							  </div>
							</div>

							<div class="card mt-3">
							  <h5 class="card-header">Categoria</h5>
							  <div class="card-body">
									<select name="category_id">
										<option value="{{($atual_category == NULL)? "0" : $atual_category['id']}}" selected>{{($atual_category == NULL) ? "Sem Categoria" : $atual_category['name']}}</option>
										@foreach ($categories as $category)
										<option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
									</select>
							  </div>
							</div>

							<div class="card mt-3">
							  <h5 class="card-header">Thumbnail</h5>
							  <div class="card-body">
									<div class="file-upload">
										<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn"><i class="material-icons">file_upload</i></a>
										<input id="thumbnail" type="text" name="thumbnail" value="{{$post->thumbnail}}">
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

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/admin/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/tinymce/config.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>$('#lfm').filemanager('file');</script>
@endsection
