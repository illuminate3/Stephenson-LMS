{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
		<nav aria-label="breadcrumb" id="page-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{URL::route('pages.index')}}">{{__('messages.pages')}}</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{__('messages.create_page')}}</li>
				</ol>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">{{__('messages.create_page')}}</h1>
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
			}}

			<div class="row">
				<form method="post" class="col" action="{{URL::route('pages.store')}}" enctype="multipart/form-data">
					<div class="row">
					<div class="col-9">
						  <div class="form-group">
							 <label for="txtTitle">Título</label>
							 <input type="text" class="form-control" id="txtTitle" placeholder="Título" name="title">
						  </div>

							<div class="form-group">
							 <label for="txtSlug">Slug</label>
							 <input type="text" class="form-control" id="txtSlug" placeholder="Título" name="slug">
						  </div>

							<div class="form-group">
							 <label for="txtContent">Conteúdo</label>
								<textarea type="text" class="form-control tinymce"  rows="8"id="txtContent" placeholder="Conteúdo" name="content"></textarea>
						  </div>

						<input type="hidden" name="author_id" value="{{Auth::user()->id}}">
					</div>

					<div class="col-3">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Adicionar</button>
					</div>
					</div>

					<input type="hidden" name="_token" value="{{csrf_token()}}">
				</form>
			</div>
		</div>
@endsection
