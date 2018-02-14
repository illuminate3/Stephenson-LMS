<nav aria-label="breadcrumb" id="page-nav">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo URL::route('tutorials.index');?>">
					<?php echo __('messages.tutorials'); ?>
				</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo __('messages.create_tutorial'); ?>
			</li>
		</ol>
	</div>
</nav>

<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">
			<?php echo __('messages.create_tutorial'); ?>
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
		<form class="col-12" method="post" action="<?php echo URL::route('tutorials.store');?>" enctype="multipart/form-data">
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
						<textarea type="text" class="form-control" id="txtTitle" placeholder="Resumo" name="resume"></textarea>
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
								<option value="0" disabled selected>Sem categoria</option>
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
								<input id="thumbnail" type="text" name="thumbnail">
							</div>
					  </div>
					</div>
				</div>

				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</div>
		</form>
	</div>