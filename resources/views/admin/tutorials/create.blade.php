{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Criar Tutorial</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::route('tutorials.index')}}">Tutoriais</a></li>
                <li class="breadcrumb-item active">Criar Tutorial</li>
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
				<form class="col-12" method="post" action="{{URL::route('tutorials.store')}}" enctype="multipart/form-data">
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
								<textarea type="text" class="form-control tinymce" rows="8" id="txtContent" placeholder="Conteúdo" name="description"></textarea>
							</div>

							<div class="form-group">
								<label for="txtTitle">Resumo</label>
								<textarea class="form-control" id="txtTitle" placeholder="Resumo" name="resume"></textarea>
							</div>

							<input type="hidden" name="author_id" value="{{Auth::user()->id}}">
						</div>

						<div class="col-3">

              @include('admin.templates.widgets.add_button')

              @include('admin.templates.widgets.categories')

              @include('admin.templates.widgets.tags')

              @include('admin.templates.widgets.thumbnail')
              
						</div>

						<input type="hidden" name="_token" value="{{csrf_token()}}">
					</div>
				</form>
			</div>
@endsection
