{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
		<nav aria-label="breadcrumb" id="page-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?php echo URL::route('categories.index');?>">
							<?php echo __('messages.categories'); ?>
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						<?php echo __('messages.edit_category'); ?>
					</li>
				</ol>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">
					<?php echo __('messages.edit_category'); ?>
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

			<form method="post" action="<?php echo URL::route('categories.update', ['id' => $category['id']]);?>">
				<div class="form-group">
					<label for="txtName">Nome</label>
					<input type="text" class="form-control" value="<?php echo $category->name ?>" id="txtName" placeholder="Nome" name="name">
				</div>

				<div class="form-group">
					<label for="txtSlug">Slug</label>
					<input type="text" class="form-control" value="<?php echo $category->slug ?>" id="txtSlug" placeholder="Slug" name="slug">
				</div>

				  <div class="form-group">
					 <label for="exampleFormControlSelect1">Hirarquia</label>
					 <select class="form-control" id="exampleFormControlSelect1" name="level">
							<option value="0" selected><?php echo __('messages.primary'); ?></option>
							<?php foreach($categories_list as $category_l) { ?>
							<option value="<?php echo $category_l['id']; ?>"><?php echo $category_l['name']; ?></option>
							<?php }?>
					 </select>
				  </div>

				<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Editar</button>
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<input type="hidden" value="PUT" name="_method">
			</form>
		</div>
@endsection
