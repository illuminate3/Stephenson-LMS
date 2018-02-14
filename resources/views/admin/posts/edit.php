<nav aria-label="breadcrumb" id="page-nav">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo URL::route('posts.index');?>">
					<?php echo __('messages.posts'); ?>
				</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo __('messages.edit_post'); ?>
			</li>
		</ol>
	</div>
</nav>

<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">
			<?php echo __('messages.edit_post'); ?>
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
		<form class="col-12" method="post" action="<?php echo URL::route('posts.update', ['post_id' => $post->id]);?>" enctype="multipart/form-data">
			<div class="row">
			<div class="col-9">
				
					<div class="form-group">
						<label for="txtTitle">Título</label>
						<input value="<?php echo $post->title; ?>" type="text" class="form-control" id="txtTitle" placeholder="Título" name="title">
					</div>

					<div class="form-group">
						<textarea type="text" class="form-control tinymce" rows="8" id="txtContent" placeholder="Conteúdo" name="content">
						<?php echo $post->content; ?>
						</textarea>
					</div>

					<div class="form-group">
						<label for="txtTitle">Resumo</label>
						<textarea type="text" class="form-control" id="txtTitle" placeholder="Resumo" name="resume">
						<?php echo $post->resume; ?>
						</textarea>
					</div>
				
				<input type="hidden" name="author_id" value="<?php echo Auth::user()->id;?>">
			</div>
			
				<div class="col-3">

					<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Adicionar</button>

					<div class="card mt-3">
					  <h5 class="card-header">Tags</h5>
					  <div class="card-body">
						  Nada por aqui
					  </div>
					</div>
					
					<div class="card mt-3">
					  <h5 class="card-header">Categoria</h5>
					  <div class="card-body">
							<select name="category_id">
								<option value="<?php echo ($atual_category == NULL)? "0" : $atual_category['id'];?>" selected><?php echo ($atual_category == NULL) ? "Sem Categoria" : $atual_category['name']; ?></option>
								<?php foreach ($categories as $category) { ?>
								<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
								<?php } ?>
							</select>
					  </div>
					</div>
					
					<div class="card mt-3">
					  <h5 class="card-header">Thumbnail</h5>
					  <div class="card-body">
							<div class="file-upload">
								<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn"><i class="material-icons">file_upload</i></a>
								<input id="thumbnail" type="text" name="thumbnail" value="<?php echo $post->thumbnail; ?>">
							</div>
					  </div>
					</div>
				</div>
			</div>
			<input type="hidden" value="PUT" name="_method">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</div>
</div>