{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Criar Postagem</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::route('posts.index')}}">Postagens</a></li>
                <li class="breadcrumb-item active">Criar Postagem</li>
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
    		<form class="col-12" method="post" action="{{ URL::route('posts.store')}}" enctype="multipart/form-data">
    			<div class="row">
    			<div class="col-9">

    					<div class="form-group">
    						<label for="txtTitle">Título</label>
    						<input type="text" class="form-control" id="txtTitle" placeholder="Título" name="title">
    					</div>

    					<div class="form-group">
    						<textarea type="text" class="form-control tinymce" rows="8" id="txtContent" placeholder="Conteúdo" name="content"></textarea>
    					</div>

    					<div class="form-group">
    						<label for="txtTitle">Resumo</label>
    						<textarea class="form-control" id="txtTitle" placeholder="Resumo" name="resume"></textarea>
    					</div>

              <div class="form-group">
                <label for="txtAuthor">Author</label>
                <input type="text" class="form-control" id="txtAuthor" disabled value="{{Auth::user()->firstname . ' ' . Auth::user()->lastname}}"></input>
              </div>
    			</div>

    				<div class="col-3">

              @include('admin.templates.widgets.add_button')

              @include('admin.templates.widgets.categories')

              @include('admin.templates.widgets.tags')

              @include('admin.templates.widgets.thumbnail')
    				</div>
    			</div>
    			<input type="hidden" name="_token" value="{{ csrf_token()}}">
    		</form>
    	</div>
    </div>
@endsection
