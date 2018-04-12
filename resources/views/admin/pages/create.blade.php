{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Criar Página</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::route('pages.index')}}">Páginas</a></li>
                <li class="breadcrumb-item active">Criar Página</li>
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
            @include('admin.templates.widgets.add_button')
					</div>
					</div>

					<input type="hidden" name="_token" value="{{csrf_token()}}">
				</form>
			</div>
		</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/admin/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/tinymce/config.js')}}"></script>
@endsection
