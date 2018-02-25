{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
		<nav aria-label="breadcrumb" id="page-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo URL::route('pages.index');?>"><?php echo __('messages.pages'); ?></a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo __('messages.edit_page'); ?></li>
				</ol>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4"><?php echo __('messages.edit_page'); ?></h1>
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
				<form method="post" class="col" action="<?php echo URL::route('pages.update', ['page_id' => $page->id]);?>" enctype="multipart/form-data">
					<div class="row">
					<div class="col-9">
						  <div class="form-group">
							 <label for="txtTitle">Título</label>
							 <input type="text" value="<?php echo $page->title; ?>" class="form-control" id="txtTitle" placeholder="Título" name="title">
						  </div>

							<div class="form-group">
							 <label for="txtSlug">Slug</label>
							 <input type="text" value="<?php echo $page->slug; ?>" class="form-control" id="txtSlug" placeholder="Título" name="slug">
						  </div>

							<div class="form-group">
							 <label for="txtContent">Conteúdo</label>
								<textarea type="text" class="form-control tinymce"  rows="8"id="txtContent" placeholder="Conteúdo" name="content">
								<?php echo $page->content; ?>
								</textarea>
						  </div>

						<input type="hidden" name="author_id" value="<?php echo Auth::user()->id;?>">
					</div>

					<div class="col-3">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Editar</button>
					</div>
					</div>

					<input type="hidden" value="PUT" name="_method">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				</form>
			</div>
		</div>
@endsection
