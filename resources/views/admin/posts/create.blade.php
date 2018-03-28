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

    					<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Adicionar</button>

    					<div class="card mt-3">
    					  <h5 class="card-header">Tags</h5>
    					  <div class="card-body">
                  <p>Digite as tags separadas por vírgula.</p>
    						  <input type="text" data-role="tagsinput" placeholder="Adicionar +" name="tags">
    					  </div>
    					</div>

    					<div class="card mt-3">
    					  <h5 class="card-header">Categoria</h5>
							  <div class="card-body">
									<select name="category_id">
										<option value="0" disabled selected>Sem categoria</option>
										@foreach ($categories as $category)
										<option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
									</select>
							  </div>
    					</div>

    					<div class="card mt-3">
    					  <h5 class="card-header">Thumbnail</h5>
    					  <div class="card-body">
                  <div class="input-group">
                     <span class="input-group-btn">
                       <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                         <i class="fa fa-picture-o"></i> Choose
                       </a>
                     </span>
                     <input id="thumbnail" class="form-control" type="text" name="filepath">
                   </div>
                   <img id="holder" style="margin-top:15px;max-height:100px;">
    					  </div>
    					</div>
    				</div>
    			</div>
    			<input type="hidden" name="_token" value="{{ csrf_token()}}">
    		</form>
    	</div>
    </div>
@endsection
